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
//后端管理员
Route::any('admin/db', ['middleware'=>'auth','uses'=>'\Miroc\LaravelAdminer\AdminerController@index']);
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

//前端
Route::group(['namespace'=>'Web'],function(){
    Route::get('article','ArticleController@index');
    Route::get('article/{id}','ArticleController@show');
    Route::get('product','ProductController@index');
    Route::get('product/{id}','ProductController@show');
    Route::get('media','MediaController@index');
    Route::get('media/{id}','MediaController@show');
});

//涉及到用户登录的操作
$api = app('Dingo\Api\Routing\Router');
$api->version('v1',function($api){
    $api->group(['namespace'=>'App\Http\Controllers\Auth'],function($api){
        $api->post('login','AuthController@login');
        $api->get('logout','AuthController@logout');
    });
    $api->group(['namespace'=>'App\Http\Controllers\Web','middleware'=>'validate'],function($api){

    });
});

