<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'check.email'],function(){
    Route::get('/', function (\Modules\Admin\Entities\Module $module) {
        $module=$module->getDefault();
        $class="\Modules\\".$module['name']."\Http\Controllers\HomeController";
        return app()->build($class)->index();
    });
});
Route::get('user/emailCheckShow', 'UserController@emailCheckShow');
Route::get('user/emailSend', 'UserController@emailSend');
Route::get('user/emailCheck/{token}', 'UserController@emailCheck');
Route::get('wx', 'WechatController@index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::any('upload', 'UploadController@make');
Route::any('upload-simditor', 'UploadController@simditor');