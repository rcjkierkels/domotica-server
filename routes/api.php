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

    Route::get('/jobs', 'JobController@index')->name('api.jobs.index');
    Route::post('/jobs/{job}/subscribe', 'JobController@subscribe')->name('api.jobs.subscribe');
    Route::delete('/jobs/{job}/subscribe', 'JobController@unsubscribe')->name('api.jobs.unsubscribe');

    Route::post('/actions/{action}/subscribe', 'ActionController@subscribe')->name('api.actions.subscribe');

    Route::post('/users', 'UserController@update')->name('api.users.update');


});
