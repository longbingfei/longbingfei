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
Route::get('test',function(){
    $json = "a:4:{i:0;a:8:{s:4:\"name\";s:37:\"屏幕快照 2016-05-31 下午4.16.11\";s:7:\"sort_id\";i:4;s:4:\"path\";s:51:\"product/images/NO.14720010746146/14720010746148.png\";s:5:\"thumb\";s:57:\"product/images/NO.14720010746146/thumb/14720010746148.png\";s:7:\"user_id\";i:1;s:10:\"updated_at\";s:19:\"2016-08-24 09:11:14\";s:10:\"created_at\";s:19:\"2016-08-24 09:11:14\";s:2:\"id\";i:4;}i:1;a:8:{s:4:\"name\";s:38:\"屏幕快照 2016-06-07 上午10.03.49\";s:7:\"sort_id\";i:4;s:4:\"path\";s:51:\"product/images/NO.14720010746146/14720010746702.png\";s:5:\"thumb\";s:57:\"product/images/NO.14720010746146/thumb/14720010746702.png\";s:7:\"user_id\";i:1;s:10:\"updated_at\";s:19:\"2016-08-24 09:11:14\";s:10:\"created_at\";s:19:\"2016-08-24 09:11:14\";s:2:\"id\";i:5;}i:2;a:8:{s:4:\"name\";s:12:\"粘贴图片\";s:7:\"sort_id\";i:4;s:4:\"path\";s:51:\"product/images/NO.14720010746146/14720110261276.png\";s:5:\"thumb\";s:57:\"product/images/NO.14720010746146/thumb/14720110261276.png\";s:7:\"user_id\";i:1;s:10:\"updated_at\";s:19:\"2016-08-24 11:57:06\";s:10:\"created_at\";s:19:\"2016-08-24 11:57:06\";s:2:\"id\";i:29;}i:3;a:8:{s:4:\"name\";s:2:\"bg\";s:7:\"sort_id\";i:4;s:4:\"path\";s:51:\"product/images/NO.14720010746146/14720110262267.png\";s:5:\"thumb\";s:57:\"product/images/NO.14720010746146/thumb/14720110262267.png\";s:7:\"user_id\";i:1;s:10:\"updated_at\";s:19:\"2016-08-24 11:57:06\";s:10:\"created_at\";s:19:\"2016-08-24 11:57:06\";s:2:\"id\";i:30;}}";
    return json_encode(unserialize($json));
});
Route::get('getverifycode', 'Common\CommonController@getVerifyCode');
Route::get('admin', function() {
    return redirect('admin/auth/login');
});
Route::any('admin/db', ['middleware' => 'auth', 'uses' => '\Miroc\LaravelAdminer\AdminerController@index']);
Route::group(['prefix' => 'admin'], function() {
    Route::get('system/{info?}', 'System\SystemInfoController@index');
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'admin'], function() {
        Route::get('login', function() {
            return view('admin.login');
        });
        Route::post('login', 'AdminAuthController@login');
        Route::post('register', ['middleware' => 'auth', 'uses' => 'AdminAuthController@register']);
        Route::get('list', ['middleware' => 'auth', 'uses' => 'AdminAuthController@index']);
        Route::put('update/{id}', ['middleware' => 'auth', 'uses' => 'AdminAuthController@update']);
        Route::get('logout', 'AdminAuthController@logout');
    });
    Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'feature'], function() {
        //具体操作
        Route::resource('media', 'MediaController');
        Route::resource('image', 'ImageController');
        Route::resource('video', 'VideoController');
        Route::resource('article_sort', 'ArticleSortController');
        Route::resource('article', 'ArticleController');
        Route::resource('product_sort', 'ProductSortController');
        Route::resource('product', 'ProductController');
        Route::get('product/show/{id}', 'ProductController@detail');
        Route::get('product_form/{id?}', 'ProductController@form');
        Route::resource('style', 'StyleController');
    });
});

Route::group(['prefix' => 'web', 'namespace' => 'Web'], function() {
    Route::get('/', 'WebController@index');
    Route::get('article', 'WebController@articleIndex');
    Route::get('article/{id}', 'WebController@articleShow');
    Route::get('product', 'WebController@productIndex');
    Route::get('product/{id}', 'WebController@productShow');
    Route::get('media/{id}', 'WebController@mediaShow');
});

//涉及到用户登录的操作
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Auth'], function($api) {
        $api->post('login', 'AuthController@login');
        $api->get('logout', 'AuthController@logout');
    });
    $api->group(['namespace' => 'App\Http\Controllers\Web', 'middleware' => 'validate'], function($api) {

    });
});

