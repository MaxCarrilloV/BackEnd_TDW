<?php

use App\Http\Controllers\InteraccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;


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

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', [AuthenticatedSessionController::class, 'login']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);