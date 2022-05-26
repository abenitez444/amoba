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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('/user')->group(function () {
    Route::get('/detail', 'UserController@detail')->middleware('auth:api');
    Route::post('/login', 'UserController@login'); // authentication
    Route::post('/register', 'UserController@register');
    Route::get('/logout', 'UserController@logout')->middleware('auth:api');
});

/*
 Route::prefix('persons')->group(function () {
    Route::get('/list', [PersonController::class,'index']); //muestra todos los registros
    Route::post('/store', [PersonController::class,'store']); // crea un registro
    Route::put('/update/{id}', [PersonController::class,'update']); // actualiza un registro
    Route::delete('/destroy/{id}', [PersonController::class,'destroy']); //elimina un registro
});
*/