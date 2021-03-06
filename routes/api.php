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

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return auth()->user();
});

Route::post('user/register','APIRegisterController@registerUser');

Route::post('user/login','APILoginController@loginUser');

Route::middleware('jwt.auth')->group(function () {
    Route::apiResource('books', 'API\BookController');
});
// 