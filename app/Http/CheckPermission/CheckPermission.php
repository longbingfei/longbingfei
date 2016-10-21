<?php
/**
 * Created by PhpStorm.
 * User: zhangxian
 * Date: 16/5/17
 * Time: 下午12:56
 */
namespace App\Http\CheckPermission;
use \Illuminate\Support\Facades\Facade;
class CheckPermission extends Facade{
    public static function getFacadeAccessor(){
        return 'check_permission';
    }
}