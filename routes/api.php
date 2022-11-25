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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// metodos de registro y de ingreso
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::apiResource('activities', App\Http\Controllers\ActivitieController::class);

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('users','App\Http\Controllers\UserController@list');
    Route::put('user','App\Http\Controllers\UserController@update');

    
    Route::apiResource('quotes', App\Http\Controllers\QuoteController::class);
    Route::apiResource('valuations', App\Http\Controllers\ValuationController::class);

});
