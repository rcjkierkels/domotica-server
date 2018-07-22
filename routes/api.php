<?php

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

Route::middleware('auth:api')->namespace('Api')->group(function() {

    Route::get('/schemes/garage/activate', 'GarageController@activate')->name('api.scheme.garage.activate');
    Route::get('/schemes/garage/status', 'GarageController@status')->name('api.scheme.garage.status');


});