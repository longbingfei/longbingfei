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
Route::get('verifycode',function(){
        $number = mt_rand(10000,99999);
        session()->flash('verifycode',$number);
        return Image::canvas(90,40,array(mt_rand(210,255),mt_rand(210,255),mt_rand(210,255)))
            ->text($number,0,15,function($font) {
            $font->size(25);
            $font->file('/Library/Fonts/AppleGothic.ttf');
            $font->color('#ccc');
            $font->valign('center');
            $font->angle(mt_rand(-8,8));
            })
            ->line(mt_rand(0,100), mt_rand(0,40),mt_rand(0,100), mt_rand(0,40), function ($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0,100), mt_rand(0,40),mt_rand(0,100), mt_rand(0,40), function ($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0,100), mt_rand(0,40),mt_rand(0,100), mt_rand(0,40), function ($draw) {
                $draw->color('#ccc');
            })
            ->line(mt_rand(0,100), mt_rand(0,40),mt_rand(0,100), mt_rand(0,40), function ($draw) {
                $draw->color('#ccc');
            })
            ->response('jpg');
});
Route::get('admin',function(){
    return redirect('admin/auth/login');
});
Route::any('admin/db', ['middleware'=>'auth','uses'=>'\Miroc\LaravelAdminer\AdminerController@index']);
Route::group(['prefix'=>'admin'],function(){
    Route::get('system/{info?}','System\SystemInfoController@index');
    Route::group(['namespace'=>'Auth','prefix'=>'auth','as'=>'admin'],function(){
        Route::get('login',function(){
            return view('admin.login');
        });
        Route::post('login','AdminAuthController@login');
        Route::post('register','AdminAuthController@register');
        Route::get('list','AdminAuthController@index');
        Route::get('zone','AdminAuthController@show');
        Route::post('update/{id}','AdminAuthController@update');
        Route::get('logout','AdminAuthController@logout');
        Route::get('/',function(){
        });
    });
    Route::group(['namespace'=>'Admin','middleware'=>'auth','prefix'=>'feature'],function(){
        //具体操作
        Route::resource('media','MediaController');
        Route::resource('image','ImageController');
        Route::resource('video','VideoController');
        Route::resource('article_sort','ArticleSortController');
        Route::resource('article','ArticleController');
        Route::resource('product_sort','ProductSortController');
        Route::resource('product','ProductController');
        Route::resource('style','StyleController');
    });
});

Route::group(['prefix'=>'web','namespace'=>'Web'],function(){
//    Route::get('/','WebController@index');
//    Route::get('article','WebController@articleIndex');
//    Route::get('article/{id}','WebController@articleShow');
//    Route::get('product','WebController@productIndex');
//    Route::get('product/{id}','WebController@productShow');
//    Route::get('media/{id}','WebController@mediaShow');
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

