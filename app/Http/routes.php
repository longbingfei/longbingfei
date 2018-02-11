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
    Route::get('/prd', 'WebController@productForm');
    Route::post('/prd', 'WebController@productCreate');
    Route::get('/prd/{id}', 'WebController@productDetail');

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
    Route::get('/admin_zone', 'WebController@adminZone');

    Route::get('/admin_user', 'WebController@adminUser');
    Route::post('/admin_change_user_status', 'WebController@adminCUS');

    Route::get('/admin_need', 'WebController@adminNeed');
    Route::post('/admin_change_need_status', 'WebController@adminCNS');
    Route::get('/admin_change_need_delete/{id}', 'WebController@adminDN');

    Route::get('/admin_company', 'WebController@adminCompany');
    Route::post('/admin_change_company_status', 'WebController@adminCCS');
    Route::get('/admin_change_company_delete/{id}', 'WebController@adminDC');

    Route::get('/admin_prd', 'WebController@adminPrd');
    Route::post('/admin_change_prd_status', 'WebController@adminCPS');
    Route::get('/admin_change_prd_delete/{id}', 'WebController@adminDP');

    //七牛上传回调
    Route::post('/qiniu_callback', 'WebController@qiniuCallback');
    Route::get('/task', 'WebController@task');

    //获取城市
    Route::get('/city/{pid}', 'WebController@getCity');
});

