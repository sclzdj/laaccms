<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api=app(\Dingo\Api\Routing\Router::class);

$api->version('v1',['namespace'=>'\App\Http\Controllers\Api'],function ($api){
    $api->group(['middleware'=>'api.throttle','limit'=>1000,'expires'=>1],function($api){
        $api->get('users','UserController@users');
        $api->get('contents','ContentController@contents');
        $api->get('content/{content}','ContentController@show');
        $api->get('slides','SlideController@slides');
        $api->get('categories','CategoryController@categories');
        $api->post('login','AuthController@login');
        $api->get('logout','AuthController@logout');
        $api->get('me','AuthController@me');
    });
});
$api->version('v2',function ($api){
    $api->get('version',function(){
        return "v2";
    });
});
