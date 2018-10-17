<?php

Route::group(['middleware' => ['web', 'auth:admin'], 'prefix' => 'wechat', 'namespace' => 'Modules\Wechat\Http\Controllers'], function()
{
    Route::get('/', 'WechatController@index')->middleware("permission:admin,resource");
});

 
//wechat_config-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'wechat','namespace'=>"Modules\Wechat\Http\Controllers"], 
function () {
    Route::resource('wechat_config', 'WechatConfigController')->middleware("permission:admin,resource");
});