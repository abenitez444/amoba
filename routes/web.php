<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

    // These are the routes for the frontend persons
    Route::prefix('persons')->group(function () {
        Route::get('/list', [PersonController::class,'index']); //muestra todos los registros
        Route::post('/store', [PersonController::class,'store']); // crea un registro
        Route::put('/update/{id}', [PersonController::class,'update']); // actualiza un registro
        Route::delete('/destroy/{id}', [PersonController::class,'destroy']); //elimina un registro
    });