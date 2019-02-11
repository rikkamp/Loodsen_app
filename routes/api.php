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
Route::put('/game', 'ActivityController@create')->middleware('cors');
Route::get('/game', 'ActivityController@get')->middleware('cors');
Route::post('/game/{id}', 'ActivityController@update')->middleware('cors');
Route::delete('/game/{id}', 'ActivityController@delete')->middleware('cors');