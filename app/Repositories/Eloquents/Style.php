<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/6/13
 * Time: 下午3:04
 */
namespace App\Repositories\Eloquents;

use App\Repositories\InterfacesBag\Style as StyleInterface;
use App\Models\Style as StyleModel;
use Auth;

class Style implements StyleInterface{
    protected $module = "style";
    public function index(){
        return StyleModel::all()->groupBy('type');
    }

    public function show($id){
        return StyleModel::findOrFail($id);
    }
    public function create(array $data){
        $data['user_id'] = Auth::id();
        if($style = StyleModel::create($data)) {
            event('log', [[$this->module, 'c', $style]]);

            return 1;
        }
    }
    public function update($id,array $data){
        $data['user_id'] = Auth::id();
        if(isset($data['status'])){
            $data['status'] = intval($data['status']);
        }
        $before = StyleModel::findOrFail($id);
        if(StyleModel::where('id',$id)->update($data)){
            $after = StyleModel::findOrFail($id);
            event('log', [[$this->module, 'u', ['before'=>$before,'after'=>$after]]]);

            return 1;
        }
    }
    public function delete($id){
        $style = StyleModel::findOrFail($id);
        if(StyleModel::destroy($id)) {
            event('log', [[$this->module, 'd', $style]]);

            return 1;
        }
    }
}