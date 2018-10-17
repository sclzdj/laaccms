<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Auth::routes();
});

Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
    Route::get('/', 'AdminController@index');
    Route::resource('role','RoleController')->middleware("permission:admin,resource");
    Route::get('role/permission/{role}','RoleController@permission')->middleware("permission:admin,resource");
    Route::post('role/permissionStore/{role}','RoleController@permissionStore')->middleware("permission:admin,resource");
});
 
//module-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'admin','namespace'=>"Modules\Admin\Http\Controllers"], 
function () {
    Route::resource('module', 'ModuleController')->middleware("permission:admin,resource");
    Route::get('module_update_cache', 'ModuleController@updateCache')->middleware("permission:admin,resource");
    Route::get('module_set_default/{module}', 'ModuleController@setDefault')->middleware("permission:admin,resource");
    Route::get('template', 'TemplateController@index')->middleware("permission:admin,resource");
    Route::get('template/set/{name}', 'TemplateController@set')->middleware("permission:admin,resource");
});