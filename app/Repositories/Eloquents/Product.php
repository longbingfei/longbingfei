<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:19
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Product as ProductModel;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Product as ProductInterface;

define('PRODUCT_IMAGE_PATH', 'product/images');

class Product implements ProductInterface
{
    protected $modules = 'product';

    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    public function index(array $condition = [])
    {
        $orderBy = $condition['orderby'] && in_array($condition['orderby'], ['id', 'sort_id', 'user_id', 'price',
            'storage']) ? 'products.' . $condition['orderby'] : 'products.id';
        $order = $condition['order'] ? $condition['order'] : 'desc';
        $product = ProductModel::orderBy($orderBy, $order)
            ->leftJoin('product_sorts', 'product_sorts.id', '=', 'products.sort_id')
            ->leftJoin('administrators', 'products.user_id', '=', 'administrators.id')
            ->select('products.*', 'product_sorts.name as sort_name', 'administrators.username');
        if ($sort_id = intval($condition['sort_id'])) {
            $product = $product->where('sort_id', $sort_id);
        }
        $page = intval($condition['page']) ? intval($condition['page']) : 1;
        $perpage = intval($condition['perpage']) ? intval($condition['perpage']) : 10;
        $product = $product->paginate($perpage, ['*'], 'page', $page)->toArray();//每页条数,字段数组,页码标记,第几页
        $product['data'] = array_map(function($value) {
            $value['images'] = $value['images'] ? unserialize($value['images']) : [];

            return $value;
        }, $product['data']);

        return $product;
    }

    public function show($id)
    {
        $return = ProductModel::where('products.id', $id)
            ->leftJoin('product_sorts', 'product_sorts.id', '=', 'products.sort_id')
            ->leftJoin('administrators', 'products.user_id', '=', 'administrators.id')
            ->select('products.*', 'product_sorts.name as sort_name', 'administrators.username')->first();

        return $return ? $return->toArray() : ['errorCode' => 1300];
    }

    public function create(array $data)
    {
        $data = array_filter($data);
        $data['pid'] = 'NO.' . microtime(true) * 10000;
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        $data['storage'] = isset($data['storage']) ? intval($data['storage']) : 1;
        $data['user_id'] = Auth::id();
        $data['images'] = serialize(call_user_func([$this, 'createProductImages'], $data['file'], $data['pid']));
        $data['describe'] = isset($data['describe']) ? htmlspecialchars($data['describe']): '';
        unset($data['file']);
        if ($product = ProductModel::create($data)) {
            event('log', [[$this->modules, 'c', $product]]);

            return $product;
        }
    }

    protected function createProductImages($files, $pid)
    {
        $params = [
            'path'       => PRODUCT_IMAGE_PATH . '/' . $pid,
            'thumb_path' => PRODUCT_IMAGE_PATH . '/' . $pid . '/thumb',
            'sort_id'    => 4,
        ];
        $files = is_array($files) ? $files : [$files];
        $images = array_map(function($y) use ($params) {
            return $this->image->create($y, $params);
        }, $files);

        return $images;
    }

    public function update($id, array $data)
    {
        if (!$before = ProductModel::where('id', $id)->first()) {
            return ['errorCode' => 1300];
        }
        $data = array_filter($data);
        $params['name'] = trim($data['name']);
        $params['price'] = trim($data['price']);
        $params['describe'] = isset($data['describe']) ? trim($data['describe']): '';
        $params['storage'] = intval($data['storage']);
        $params['sort_id'] = intval($data['sort_id']);
        $params['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        $params['user_id'] = Auth::id();
        if(!$images = unserialize($before->images)){
            $images = [];
        }
        if (isset($data['drop_images']) && ($drop_images = explode(',', $data['drop_images']))) {
            $images = array_filter($images, function($y) use ($drop_images) {
                return !in_array($y['id'], $drop_images);
            });
            $this->image->delete($data['drop_images']);
        }
        if (isset($data['file'])) {
            $new_images = call_user_func([$this, 'createProductImages'], $data['file'], $before->pid);
            $images = array_merge($images, $new_images);

        }
        $params['images'] = serialize($images);
        if (ProductModel::where('id', $id)->update($params)) {
            $after = ProductModel::where('id', $id)->first();
            event('log', [[$this->modules, 'u', ['before' => $before, 'after' => $after]]]);

            return $after;
        }
    }

    public function delete($id)
    {
        if (!$product = ProductModel::where('id', $id)->first()) {
            return ['errorCode' => 1300];
        }
        $images = unserialize($product['images']);
        if (!empty($images)) {
            $ids = implode(',', array_column($images, 'id'));
            $this->image->delete($ids);
            @rmdir(public_path(PRODUCT_IMAGE_PATH . '/' . $product->pid . '/thumb'));
            @rmdir(public_path(PRODUCT_IMAGE_PATH . '/' . $product->pid));
        }
        if (ProductModel::destroy($id)) {
            event('log', [[$this->modules, 'd', $product]]);

            return $product;
        }
    }
}