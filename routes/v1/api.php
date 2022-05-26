<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

/*oute::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('/user')->group(function () {
    Route::post('/login', [LoginController::class,'store']); // crea un registro

});

/*
 Route::prefix('persons')->group(function () {
    Route::get('/list', [PersonController::class,'index']); //muestra todos los registros
    Route::post('/store', [PersonController::class,'store']); // crea un registro
    Route::put('/update/{id}', [PersonController::class,'update']); // actualiza un registro
    Route::delete('/destroy/{id}', [PersonController::class,'destroy']); //elimina un registro
});
*/