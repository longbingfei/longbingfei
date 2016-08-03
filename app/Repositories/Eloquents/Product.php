<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:19
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\Product as ProductInterface;
use App\Models\Product as ProductModel;
use App\Models\Image as ImageModel;
use Auth;

class Product implements ProductInterface{
    protected $modules = 'product';
    public function index(array $condition){
        return array_map(function($y){
            $y['images'] = $y['images']  ? unserialize($y['images']) : [];
            return $y;
        },ProductModel::all()->toArray());
    }
    public function show($id){
        return ProductModel::findOrFail($id);
    }
    public function create(array $data){
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['images'] = serialize(json_decode($data['images'],1));
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        $data['user_id'] = Auth::id();

        if($product = ProductModel::create($data)){
            event('log',[[$this->modules,'c',$product]]);

            return 1;
        }
    }
    public function update($id,array $data){
        $before = ProductModel::findOrFail($id)->toArray();
        $data['sort_id'] = isset($data['sort_id']) ? intval($data['sort_id']) : 1;
        $data['evaluate'] = isset($data['evaluate']) ? intval($data['evaluate']) : 5;
        if(isset($data['status'])){
            $data['status'] = intval($data['status']);
        }
        if(ProductModel::where('id',$id)->update($data)){
            event('log',[[$this->modules,'u',['before'=>$before,'after'=>ProductModel::findOrFail($id)->toArray()]]]);

            return 1;
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

            return 1;
        }
    }
}