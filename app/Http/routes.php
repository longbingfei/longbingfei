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
Route::get('getverifycode', 'Common\CommonController@getVerifyCode');
Route::get('download', 'Common\CommonController@downloadFile');
Route::any('nginx', 'System\SystemInfoController@nginx');
Route::group(['prefix' => 'admin'], function () {
    //数据库
    Route::any('db', ['middleware' => ['auth', 'permission:db'], 'uses' => '\Miroc\LaravelAdminer\AdminerController@index']);
    //系统信息
    Route::get('system/{info?}', 'System\SystemInfoController@index');
    //角色与权限
    Route::group(['namespace' => 'Auth'], function () {
        //登录
        Route::get('/', function () {
            return view('admin.' . (Auth::check() ? 'apps' : 'login'));
        });
        Route::post('login', 'AdminAuthController@login');
        //注册
        Route::post('register', 'AdminAuthController@register');
        //用户列表
        Route::get('auth_list', 'AdminAuthController@index');
        //角色
        Route::get('roles', 'AdminAuthController@roles');
        //权限
        Route::get('permissions', 'AdminAuthController@permissions');
        //角色绑定用户
        Route::post('attach_roles/{user_id}', 'AdminAuthController@AttachRoles');
        //权限绑定角色
        Route::post('attach_permissions/{role_id}', 'AdminAuthController@AttachPermissions');
        //用户更新
        Route::put('auth_update/{id}', 'AdminAuthController@update');
        //用户删除
        Route::get('auth_delete/{id}', 'AdminAuthController@delete');
        //登出
        Route::get('logout', 'AdminAuthController@logout');
    });
    Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
        //分类
        Route::resource('sort', 'SortController');
        Route::get('sort_form', 'SortController@settings');
        //标签
        Route::resource('tag', 'TagController');
        //发布
        Route::resource('publish', 'PublishController');
        //相册
        Route::resource('gallery', 'GalleryController');
        //图片
        Route::resource('image', 'ImageController');
        //视频
        Route::resource('video', 'VideoController');
        //文稿
        Route::resource('article', 'ArticleController');
        Route::get('article_form/{id?}', 'ArticleController@form');
        //商品
        Route::resource('product', 'ProductController');
        Route::get('product_form/{id?}', 'ProductController@form');
        //日志
        Route::get('log', 'LogController@index');
        Route::get('recovery/{id}', 'LogController@recovery');
    });
});

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'WebController@index');
    Route::get('/index', 'WebController@index');

    //需求
    Route::get('/need', 'WebController@need');
    Route::get('/need/{id}', 'WebController@needDetail');
    Route::get('/create_need', 'WebController@needForm');
    Route::post('/create_need', 'WebController@createNeed');

    //企业
    Route::get('/establish', 'WebController@companyForm');
    Route::post('/establish', 'WebController@establish');
    Route::get('/company', 'WebController@company');
    Route::get('/company/{id}', 'WebController@companyDetail');

    //产品
    Route::get('/p', 'WebController@product');
    Route::get('/product', 'WebController@productForm');
    Route::post('/product', 'WebController@productCreate');
    Route::get('/product/{id}', 'WebController@productDetail');

    //用户操作
    Route::get('/register', function () {
        return view('tpl.default.register');
    });
    Route::post('/register', 'WebController@register');
    Route::get('/login', function () {
        return view('tpl.default.login');
    });
    Route::post('/login', 'WebController@login');
    Route::get('/logout', 'WebController@logout');
    Route::get('/zone/{id}', 'WebController@zone');

    //七牛上传回调
    Route::post('/qiniu_callback', 'WebController@qiniuCallback');
    Route::get('/task', 'WebController@task');

    //获取城市
    Route::get('/city/{pid}', 'WebController@getCity');
});

//前端涉及到用户登录的操作
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Auth'], function ($api) {
        $api->post('login', 'AuthController@login');
        $api->get('logout', 'AuthController@logout');
    });
    $api->group(['namespace' => 'App\Http\Controllers\Web', 'middleware' => 'validate'], function ($api) {
        //
    });
});

