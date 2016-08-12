<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('display',function($data = null){
            if(isset($data['errorCode']) && ($errorCode = $data['errorCode'])){
                $message = ['error_code'=>config('error.'.$errorCode,false) ? $errorCode : '000' , 'error_message'=>config('error.'.$errorCode, '错误代码不存在')];
            }else{
                $message = $data;
            }
            //若ajax请求则返回固定格式
            return request()->ajax() ? Response::make($message) : $message;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('resp','App\Http\Response\Resping');
        app()->bind('App\Repositories\InterfacesBag\Administrator','App\Repositories\Eloquents\Administrator');
        app()->bind('App\Repositories\InterfacesBag\Media','App\Repositories\Eloquents\Media');
        app()->bind('App\Repositories\InterfacesBag\ProductSort','App\Repositories\Eloquents\ProductSort');
        app()->bind('App\Repositories\InterfacesBag\Product','App\Repositories\Eloquents\Product');
        app()->bind('App\Repositories\InterfacesBag\ArticleSort','App\Repositories\Eloquents\ArticleSort');
        app()->bind('App\Repositories\InterfacesBag\Article','App\Repositories\Eloquents\Article');
        app()->bind('App\Repositories\InterfacesBag\Image','App\Repositories\Eloquents\Image');
        app()->bind('App\Repositories\InterfacesBag\Video','App\Repositories\Eloquents\Video');
        app()->bind('App\Repositories\InterfacesBag\Style','App\Repositories\Eloquents\Style');
        //前端用户
        app()->bind('App\Repositories\InterfacesBag\User','App\Repositories\Eloquents\User');
        //表单验证
        app()->bind('ValidatorForm',function(){
            return function($request,$fields){
                $keys = array_keys($fields);
                $rule = [];
                array_map(function ($y) use (&$rule) {
                    $a = explode('.', $y);
                    $key = current($a);
                    $rule[$key] = isset($rule[$key]) ? $rule[$key] . '|' . last($a) : last($a);
                }, $keys);
                $finalKeys = array_map(function ($y) {
                    if (($position = strpos($y, ':')) !== false) {
                        return substr($y, 0, $position);
                    }
                    return $y;
                }, $keys);
                $validator = Validator::make($request->all(), $rule, array_combine($finalKeys, array_values($fields)));
                if ($validator->fails()) {
                    return current($validator->errors()->all());
                }

                return false;
            };
        });
    }
}
