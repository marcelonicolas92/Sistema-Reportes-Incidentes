<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/clientes', [\App\Http\Controllers\ClientesController::class, 'index']);

Route::get('/clientes/create', [\App\Http\Controllers\ClientesController::class, 'create']);

Route::post('/clientes', [\App\Http\Controllers\ClientesController::class, 'store']);*/

/**
 * ':id' -> Route Param
 * Ejemplo: /clientes/8
 */
/*Route::get('/clientes/:id', [\App\Http\Controllers\ClientesController::class, 'show']);

Route::get('/clientes/:id/edit', [\App\Http\Controllers\ClientesController::class, 'edit']);

Route::put('/clientes/:id', [\App\Http\Controllers\ClientesController::class, 'update']);

Route::delete('/clientes/:id', [\App\Http\Controllers\ClientesController::class, 'destroy']);*/

Route::resource('clientes', \App\Http\Controllers\ClientesController::class);

Route::get('/saludar', function() {
    return "hola";
});
