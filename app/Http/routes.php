<?php
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

