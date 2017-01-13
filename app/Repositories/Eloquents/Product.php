<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:19
 */
namespace App\Repositories\Eloquents;

use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product as ProductModel;
use App\Repositories\InterfacesBag\Tag as TagInterface;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Product as ProductInterface;

define('PRODUCT_IMAGE_PATH', 'product/images');

class Product implements ProductInterface
{
    protected $modules = 'product';

    protected $image;
    protected $tag;

    public function __construct(ImageInterface $image, TagInterface $tag)
    {
        $this->image = $image;
        $this->tag = $tag;
    }

    public function index(array $condition = [])
    {
        $orderBy = $condition['orderby'] && in_array($condition['orderby'], ['id', 'sort_id', 'user_id', 'price',
            'storage']) ? 'products.' . $condition['orderby'] : 'products.id';
        $order = $condition['order'] ? $condition['order'] : 'desc';
        $product = ProductModel::orderBy($orderBy, $order)
            ->leftJoin('product_sorts', 'product_sorts.id', '=', 'products.sort_id')
            ->leftJoin('administrators', 'products.user_id', '=', 'administrators.id')
            ->leftJoin('tags', DB::raw('FIND_IN_SET(tags.id,products.tag_ids)'), DB::raw(null), DB::raw(null))
            ->groupBy('products.id')
            ->select(
                [
                    'products.*',
                    'product_sorts.name AS sort_name',
                    'administrators.username',
                    DB::raw('GROUP_CONCAT(tags.name) AS tag_names')
                ]
            );
        if ($sort_id = intval($condition['sort_id'])) {
            $product = $product->where('sort_id', $sort_id);
        }
        $page = intval($condition['page']) ? intval($condition['page']) : 1;
        $perpage = intval($condition['perpage']) ? intval($condition['perpage']) : 10;
        if ($tag_ids = trim($condition['tag_ids'])) {
            foreach (explode(',', $tag_ids) as $vo) {
                $product = $product->whereRaw("FIND_IN_SET($vo, products.tag_ids)");
            }
        }
        $product = $product->paginate($perpage, ['*'], 'page', $page)->toArray();//每页条数,字段数组,页码标记,第几页
        $product['data'] = array_map(function($value) {
            $value['images'] = json_decode($value['images'], 1) ? : [];

            return $value;
        }, $product['data']);

        return $product;
    }

    public function show($id)
    {
        $return = ProductModel::where('products.id', $id)
            ->leftJoin('product_sorts', 'product_sorts.id', '=', 'products.sort_id')
            ->leftJoin('administrators', 'products.user_id', '=', 'administrators.id')
            ->leftJoin('tags', DB::raw('FIND_IN_SET(tags.id,products.tag_ids)'), DB::raw(null), DB::raw(null))
            ->select(
                [
                    'products.*',
                    'product_sorts.name as sort_name',
                    'administrators.username',
                    DB::raw('GROUP_CONCAT(tags.name) AS tag_names')
                ]
            )->first();
        if ($return) {
            $return['images'] = json_decode($return['images'], 1) ? : [];
        }

        return $return ? $return->toArray() : ['error_code' => 1300];
    }

    public function create(array $data)
    {
        $data = array_filter($data);
        $data['pid'] = 'NO.' . microtime(true) * 10000;
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        $data['storage'] = isset($data['storage']) ? intval($data['storage']) : 1;
        $data['user_id'] = Auth::id();
        $data['images'] = json_encode(call_user_func([$this, 'createProductImages'], $data['file'], $data['pid']));
        $data['describe'] = isset($data['describe']) ? $data['describe'] : '';
        if (isset($data['tag_ids'])) {
            $data['tag_ids'] = $this->tag->filterTagByIds($data['tag_ids']);
        }
        unset($data['file']);
        if (!$product = ProductModel::create($data)) {
            return ['error_code' => 13071];
        }
        event('log', [[$this->modules, 'c', $product]]);
        if (isset($data['tag_ids']) && !empty($data['tag_ids'])) {
            $this->tag->changeTagCount(['after' => $data['tag_ids']]);
        }

        return $product;
    }

    protected function createProductImages($files, $pid)
    {
        $params = [
            'path'       => PRODUCT_IMAGE_PATH . '/' . $pid,
            'thumb_path' => PRODUCT_IMAGE_PATH . '/' . $pid . '/thumb',
            'sort_id'    => 3,
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
            return ['error_code' => 1300];
        }
        $data = array_filter($data);
        $params['name'] = trim($data['name']);
        $params['price'] = trim($data['price']);
        if (isset($data['describe'])) {
            $params['describe'] = trim($data['describe']);
        }
        if (isset($data['storage'])) {
            $params['storage'] = intval($data['storage']);
        }
        if (isset($data['sort_id'])) {
            $params['sort_id'] = intval($data['sort_id']);
        }
        if (isset($data['evaluate'])) {
            $params['evaluate'] = intval($data['evaluate']);
        }
        if (isset($data['tag_ids'])) {
            $params['tag_ids'] = $this->tag->filterTagByIds($data['tag_ids']);
        }
        $params['user_id'] = Auth::id();
        $images = json_decode($before->images, 1) ? : [];
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
        $params['images'] = json_encode($images);
        if (!ProductModel::where('id', $id)->update($params)) {
            return ['error_code' => 13072];
        }
        $after = ProductModel::where('id', $id)->first();
        event('log', [[$this->modules, 'u', ['before' => $before, 'after' => $after]]]);
        if (isset($params['tag_ids']) && !empty($params['tag_ids'])) {
            $this->tag->changeTagCount(['before' => $before->tag_ids, 'after' => $params['tag_ids']]);
        }

        return $after;
    }

    public function delete($id)
    {
        if (!$product = ProductModel::where('id', $id)->first()) {
            return ['error_code' => 1300];
        }
        $images = json_decode($product['images'], 1) ? : [];
        if (!empty($images)) {
            $ids = implode(',', array_column($images, 'id'));
            $this->image->delete($ids);
            @rmdir(public_path(PRODUCT_IMAGE_PATH . '/' . $product->pid . '/thumb'));
            @rmdir(public_path(PRODUCT_IMAGE_PATH . '/' . $product->pid));
        }
        if (!ProductModel::destroy($id)) {
            return ['error_code' => 13073];
        }
        event('log', [[$this->modules, 'd', $product]]);
        if ($tag_ids = $product->tag_ids) {
            $this->tag->changeTagCount(['before' => $tag_ids]);
        }

        return $product;
    }
}