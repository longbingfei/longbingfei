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
Route::get('test', function() {
    dd(array_diff([2,3,4],[2,3]));
});
Route::get('getverifycode', 'Common\CommonController@getVerifyCode');
Route::get('download', 'Common\CommonController@downloadFile');
Route::get('admin', function() {
    return redirect('admin/auth/login');
});
Route::group(['prefix' => 'admin'], function() {
    Route::any('db', ['middleware' => ['auth', 'permission:db'], 'uses' => '\Miroc\LaravelAdminer\AdminerController@index']);
    Route::get('system/{info?}', 'System\SystemInfoController@index');
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'admin'], function() {
        Route::get('login', function() {
            return view('admin.login');
        });
        Route::post('login', 'AdminAuthController@login');
        Route::get('home', function() {
            return view('admin.home');
        });
        Route::post('register', 'AdminAuthController@register');
        Route::get('list', 'AdminAuthController@index');
        Route::get('roles', 'AdminAuthController@roles');
        Route::get('permissions', 'AdminAuthController@permissions');
        Route::post('attach_roles/{user_id}', 'AdminAuthController@AttachRoles');
        Route::post('attach_permissions/{role_id}', 'AdminAuthController@AttachPermissions');
        Route::put('update/{id}', 'AdminAuthController@update');
        Route::get('delete/{id}', 'AdminAuthController@delete');
        Route::get('logout', 'AdminAuthController@logout');
    });
    Route::group(['namespace' => 'Admin', 'prefix' => 'feature', 'middleware' => 'auth'], function() {
        //具体操作
        Route::resource('sort', 'SortController');
        Route::get('sort_form', 'SortController@settings');
        Route::resource('publish', 'PublishController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('image', 'ImageController');
        Route::resource('video', 'VideoController');
        Route::resource('article', 'ArticleController');
        Route::resource('style', 'StyleController');
        Route::get('article/show/{id}', 'ArticleController@detail');
        Route::get('article_form/{id?}', 'ArticleController@form');
        Route::resource('product', 'ProductController');
        Route::get('product/show/{id}', 'ProductController@detail');
        Route::get('product_form/{id?}', 'ProductController@form');
        Route::get('log/list', 'LogController@index');
        Route::get('recovery/{id}', 'LogController@recovery');
        Route::resource('tag', 'TagController');
    });
});

Route::group(['namespace' => 'Web'], function() {
    Route::get('/', 'WebController@index');
    Route::get('article', 'WebController@articleIndex');
    Route::get('article/{id}', 'WebController@articleShow');
    Route::get('product', 'WebController@productIndex');
    Route::get('product/{id}', 'WebController@productShow');
    Route::get('media/{id}', 'WebController@mediaShow');
});

//前端涉及到用户登录的操作
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Auth'], function($api) {
        $api->post('login', 'AuthController@login');
        $api->get('logout', 'AuthController@logout');
    });
    $api->group(['namespace' => 'App\Http\Controllers\Web', 'middleware' => 'validate'], function($api) {
        //
    });
});

