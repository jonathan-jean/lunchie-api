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


Route::get('/restaurants', "RestaurantController@index");

Route::get('/user/lunches', "LunchController@scheduled")->middleware('auth:api');

Route::get('/lunches', "LunchController@search")->middleware('auth:api');
Route::post('/lunches', "LunchController@create")->middleware('auth:api');
Route::delete('/lunches/{lunch}', "LunchController@delete")->middleware('auth:api');
Route::post('/lunches/{lunch}/join', "LunchController@join")->middleware('auth:api');
Route::post('/lunches/{lunch}/accept/{user}', "LunchController@accept")->middleware('auth:api');
Route::post('/lunches/{lunch}/leave', "LunchController@leave")->middleware('auth:api');
Route::get('/lunches/{lunch}', "LunchController@get")->middleware('auth:api');


Route::post('/register', "Auth\RegisterController@register");