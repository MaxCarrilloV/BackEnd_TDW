<?php

use App\Http\Controllers\InteraccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/perro')->group(function () use ($router) {
    $router->post('registrar', [PerroController::class, 'createPerro']);
    $router->get('listar',[PerroController::class, 'listarPerros']);
    $router->get('ver/{perro}',[PerroController::class, 'verPerro']);
    $router->post('edit/{perro}', [PerroController::class, 'updatePerro']);
    $router->delete('eliminar/{perro}',[PerroController::class, 'eliminarPerro']);
});

Route::prefix('/interaccion')->group(function () use ($router) {
    $router->post('registrar', [InteraccionController::class, 'createInteraccion']);
});