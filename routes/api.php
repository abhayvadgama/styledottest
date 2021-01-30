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


Route::get('get-broadband-price/{provider}/{product}','TestController@get_broadband_price');
Route::get('get-energy-price/{provider}/{product}/{product_variation}','TestController@get_energy_price');
Route::patch('update-energy-price','TestController@update_energy_price');
