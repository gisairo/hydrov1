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

Route::namespace('api')->group(function (){
    Route::get('/smart-devices', 'SmartdeviceController@index');
    Route::post('/smart-devices', 'SmartdeviceController@store');
    Route::get('/smart-devices/{id}', 'SmartdeviceController@show');
    Route::put('/smart-devices/{id}', 'SmartdeviceController@update');
    Route::delete('/smart-devices/{id}', 'SmartdeviceController@destroy');
});
// Route::resource('smart-devices', 'API\SmartdeviceController');
