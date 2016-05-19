<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/19
 * Time: 上午9:11
 */
namespace App\Repositories\Eloquents;
use App\Repositories\InterfacesBag\ProductSort as ProductSortInterface;
use App\Models\ProductSort as ProductSortModel;
use Auth;
class ProductSort implements ProductSortInterface{
    protected $module = 'product_sorts';
    public function index(){
        return ProductSortModel::all();
    }
    public function create(array $data){
        $data['user_id'] = Auth::id();

        if(ProductSortModel::where('name',$data['name'])->count()){
            event('log',[[$this->module,'c','sort_already_exist',0]]);

            return 0;
        }
        ProductSortModel::create($data);
        event('log',[[$this->module,'c',$data]]);

        return 1;
    }
    public function update($id,array $data){
        $data['user_id'] = Auth::id();
        $before = ProductSortModel::findOrfail($id)->toArray();
        if(ProductSortModel::where('name',$data['name'])->count()){
            event('log',[[$this->module,'u','sort_already_exist',0]]);

            return 0;
        }

        if(ProductSortModel::where('id',$id)->update($data)){
            event('log',[[$this->module,'u',['before'=>$before,'after'=>ProductSortModel::findOrfail($id)->toArray()
            ]]]);

            return 1;
        }
    }
    public function delete($id){
        $info = ProductSortModel::findOrFail($id)->toArray();
        if(ProductSortModel::destroy($id)){
            event('log',[[$this->module,'d',$info]]);

            return 1;
        }
    }
}