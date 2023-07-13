<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', "JWTController@register");
    Route::post('/login', "JWTController@login");
    Route::post('/logout', "JWTController@logout");
    Route::post('/refresh', "JWTController@refresh");
    Route::post('/profile', "JWTController@profile");
});

Route::group(['prefix' => 'users'], function($router) {
    Route::post('/profile-user', "User\ProfileUserController@register");
});

