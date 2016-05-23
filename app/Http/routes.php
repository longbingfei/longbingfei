<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',function(){
    return \Illuminate\Foundation\Inspiring::quote();
});
Route::any('db', '\Miroc\LaravelAdminer\AdminerController@index');
Route::group(['prefix'=>'admin'],function(){
    Route::get('system/{info?}','System\SystemInfoController@index');
    Route::group(['namespace'=>'Auth','prefix'=>'auth','as'=>'admin'],function(){
        Route::get('login',function(){
            return view('admin.login');
        });
        Route::post('login','AdminAuthController@login');
        Route::post('register','AdminAuthController@registere');
        Route::get('list','AdminAuthController@index');
        Route::post('update/{id}','AdminAuthController@update');
        Route::get('logout','AdminAuthController@logout');
        Route::get('/',function(){
        });
    });
    Route::group(['namespace'=>'Admin','middleware'=>'auth','prefix'=>'feature'],function(){
        Route::get('/',['as'=>'home',function(){
            return view('admin.homepage');
        }]);
        Route::resource('media','MediaController');
        Route::resource('article_sort','ArticleSortController');
        Route::resource('article','ArticleController');
        Route::resource('product_sort','ProductSortController');
        Route::resource('product','ProductController');
    });
});
$api = app('Dingo\Api\Routing\Router');
$api->version('v1',function($api){
    $api->group(['namespace'=>'App\Http\Controllers\Auth'],function($api){
        $api->post('login','AuthController@login');
        $api->post('logout','AuthController@logout');
    });
    $api->group(['namespace'=>'App\Http\Controllers\Web','middleware'=>'validate'],function($api){
        $api->post('getuserinfo',function(){
            return 123;
        });
    });
});

