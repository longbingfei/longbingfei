<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
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
        Response::macro('push',function($data = null){
            return Response::make(['error_code'=>0,'data'=>$data]);
        });
        Response::macro('error',function($code){
            return Response::make(['error_code'=>config('error.'.$code,false) ? $code : '000' , 'error_message'=>config('error.'.$code, '错误代码不存在')]);
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
        //front
        app()->bind('App\Repositories\InterfacesBag\User','App\Repositories\Eloquents\User');
    }
}
