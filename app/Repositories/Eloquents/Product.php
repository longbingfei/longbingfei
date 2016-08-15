<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:19
 */
namespace App\Repositories\Eloquents;

use Auth;
use App\Models\Image as ImageModel;
use App\Models\Product as ProductModel;
use App\Repositories\InterfacesBag\Image as ImageInterface;
use App\Repositories\InterfacesBag\Product as ProductInterface;

class Product implements ProductInterface{
    protected $modules = 'product';

    protected $image;

    public function __construct(ImageInterface $image)
    {
        $this->image = $image;
    }

    public function index(array $condition){
        $orderBy = $condition['orderby'] && in_array($condition['orderby'],['id','sort_id','user_id','price',
                'storage']) ? 'products.'.$condition['orderby'] : 'products.id';
        $order = $condition['order'] ? $condition['order'] : 'desc';
        $product = ProductModel::orderBy($orderBy,$order)
            ->leftJoin('product_sorts','product_sorts.id','=','products.sort_id')
            ->leftJoin('administrators','products.user_id','=','administrators.id')
            ->select('products.*', 'product_sorts.name as sort_name','administrators.username');
        if($sort_id = intval($condition['sort_id'])){
            $product = $product->where('sort_id',$sort_id);
        }
        $page = intval($condition['page']) ? intval($condition['page']) : 1;
        $perpage = intval($condition['perpage']) ? intval($condition['perpage']) : 10;
        $product = $product->paginate($perpage, ['*'], 'page', $page)->toArray();//每页条数,字段数组,页码标记,第几页
        $product['data'] = array_map(function($value){
            $value['images'] = $value['images'] ? unserialize($value['images']) : [];
            return $value;
        },$product['data']);

        return $product;
    }

    public function show($id){
        $return = ProductModel::where('products.id',$id)
            ->leftJoin('product_sorts','product_sorts.id','=','products.sort_id')
            ->leftJoin('administrators','products.user_id','=','administrators.id')
            ->select('products.*', 'product_sorts.name as sort_name','administrators.username')->first();

        return $return ? $return : ['errorCode'=>1300];
    }

    public function create(array $data){
        $data = array_filter($data);
        $data['pid'] = 'NO.'.microtime(true)*10000;
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        $data['storage'] = isset($data['storage']) ? intval($data['storage']) : 1;
        $data['user_id'] = Auth::id();
        $data['images'] = serialize(call_user_func([$this,'createProductImages'],$data['file'],$data['pid']));
        unset($data['file']);
        if($product = ProductModel::create($data)){
            event('log',[[$this->modules,'c',$product]]);

            return $product;
        }
    }

    protected function createProductImages($files,$pid){
        $path = 'product/images/'.$pid;
        $thumb_path = $path.'/thumb';
        $params = [
            'path'=>$path,
            'thumb_path'=>$thumb_path,
            'sort_id'=>4,
        ];
        $files = is_array($files) ? $files : [$files];
        $images = array_map(function($y)use($params){
            return $this->image->create($y,$params)->toArray();
        },$files);

        return $images;
    }

    public function update($id,array $data){
        $before = ProductModel::findOrFail($id)->toArray();
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        if(isset($data['status'])){
            $data['status'] = intval($data['status']);
        }
        if(ProductModel::where('id',$id)->update($data)){
            $after = ProductModel::findOrFail($id);
            event('log',[[$this->modules,'u',['before'=>$before,'after'=>$after]]]);

            return $after;
        }
    }

    public function delete($id){
        $product = ProductModel::findOrFail($id)->toArray();
        $images = unserialize($product['images']);
        if(!empty($images)){
            foreach($images as $vo){
                ImageModel::where('id',$vo['id'])->delete();
                @unlink(public_path($vo['path']));
            }
        }
        if(ProductModel::destroy($id)){
            event('log',[[$this->modules,'d',$product]]);

            return $product;
        }
    }
}