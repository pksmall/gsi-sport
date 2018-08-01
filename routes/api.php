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

Route::group(['prefix' => '/v1'], function () {
    Route::post('get_np_cities', 'ApiNpController@get_np_cities');
    Route::post('get_np_warehouses', 'ApiNpController@get_np_warehouses');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
