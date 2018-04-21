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

Route::namespace('Api')->group(function () {
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');

    Route::middleware('auth:api')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::prefix('otp')->group(function () {
            Route::put('/generate/{phone}', 'OtpController@generate');
            Route::post('/verificate/{code}', 'OtpController@verificate');
        });

        Route::apiResource('post', 'PostController');
    });
});
