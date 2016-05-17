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
    dd(app('auth'));
});
Route::any('db', '\Miroc\LaravelAdminer\AdminerController@index');
Route::group(['namespace'=>'Auth','prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/',['as'=>'homepage',function(){
        return view('auth.admin.homepage');
    }]);
    Route::get('login',function(){
        return view('auth.admin.login');
    });
    Route::post('login',['as'=>'login','uses'=>'AdminAuthController@login']);
    Route::post('register',['as'=>'register','uses'=>'AdminAuthController@register']);
    Route::get('logout',['as'=>'logout','uses'=>'AdminAuthController@logout']);
});
