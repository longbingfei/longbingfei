<?php

namespace App\Providers;

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
        //
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
        //front
        app()->bind('App\Repositories\InterfacesBag\User','App\Repositories\Eloquents\User');
    }
}
