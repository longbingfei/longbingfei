<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('display', function($data = null) {
            if (isset($data['error_code']) && ($error_code = $data['error_code'])) {
                $message = ['error_code' => config('error.' . $error_code, false) ? $error_code : '000', 'error_message' => config('error.' . $error_code, '错误代码不存在')];
            } else {
                $message = $data;
            }

            //若ajax请求则返回固定格式
            return request()->ajax() ? Response::make($message) : $message;
        });

        // 自定义多文件验证规则
        Validator::extend('images', function($attribute, $value, $parameters) {
            if (!is_array($value)) {
                return false;
            }

            return array_filter($value, function($y) {
                return $y instanceof UploadedFile && strpos('|png|jpg|jpeg|gif|bmp|', $y->guessExtension());
            }) == $value;
        });

        // 自定义验证浮点值
        Validator::extend('float', function($attribute, $value, $parameters) {
            return is_numeric($value) && (float)$value > 0;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('resp', 'App\Http\Response\Resping');
        app()->bind('App\Repositories\InterfacesBag\Administrator', 'App\Repositories\Eloquents\Administrator');
        app()->bind('App\Repositories\InterfacesBag\Media', 'App\Repositories\Eloquents\Media');
        app()->bind('App\Repositories\InterfacesBag\Product', 'App\Repositories\Eloquents\Product');
        app()->bind('App\Repositories\InterfacesBag\Article', 'App\Repositories\Eloquents\Article');
        app()->bind('App\Repositories\InterfacesBag\Image', 'App\Repositories\Eloquents\Image');
        app()->bind('App\Repositories\InterfacesBag\Video', 'App\Repositories\Eloquents\Video');
        app()->bind('App\Repositories\InterfacesBag\Style', 'App\Repositories\Eloquents\Style');
        app()->bind('App\Repositories\InterfacesBag\Log', 'App\Repositories\Eloquents\Log');
        app()->bind('App\Repositories\InterfacesBag\Publish', 'App\Repositories\Eloquents\Publish');
        app()->bind('App\Repositories\InterfacesBag\Gallery', 'App\Repositories\Eloquents\Gallery');
        app()->bind('App\Repositories\InterfacesBag\Tag', 'App\Repositories\Eloquents\Tag');
        app()->bind('App\Repositories\InterfacesBag\Sort', function() {
            return new \App\Repositories\Eloquents\Sort(request()->get('app'));
        });
        //前端用户
        app()->bind('App\Repositories\InterfacesBag\User', 'App\Repositories\Eloquents\User');
        //权限验证门面
        app()->bind('check_permission', 'App\Http\CheckPermission\CheckPermissionOperate');
        //表单验证
        app()->bind('ValidatorForm', function() {
            return function($request, $fields) {
                $keys = array_keys($fields);
                $rule = [];
                array_map(function($y) use (&$rule) {
                    $a = explode('.', $y);
                    $key = current($a);
                    $rule[$key] = isset($rule[$key]) ? $rule[$key] . '|' . last($a) : last($a);
                }, $keys);
                $finalKeys = array_map(function($y) {
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
