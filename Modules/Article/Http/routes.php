<?php

Route::group(['middleware' => ['web'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    Route::get('home/lists/{category}','HomeController@lists');
    Route::get('home/content/{content}','HomeController@content');
});

Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    Route::resource('category','CategoryController');
});
 
//content-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'article','namespace'=>"Modules\Article\Http\Controllers"], 
function () {
    Route::resource('content', 'ContentController')->middleware("permission:admin,resource");
    Route::get('/','ContentController@index');
});
 
//slide-route
Route::group(['middleware' => ['web', 'auth:admin'],'prefix'=>'article','namespace'=>"Modules\Article\Http\Controllers"], 
function () {
    Route::resource('slide', 'SlideController')->middleware("permission:admin,resource");
});
 
//comment-route
Route::group(['middleware' => ['web', 'auth:web'],'prefix'=>'article','namespace'=>"Modules\Article\Http\Controllers"],
function () {
    Route::resource('comment', 'CommentController');
});