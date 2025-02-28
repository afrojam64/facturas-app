<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\FacturaController;

// Ruta por defecto para redirigir a una vista principal
Route::get('/', function () {
    return view('home');
});

// Rutas de recursos para Clientes
Route::resource('clientes', ClienteController::class);

// Rutas de recursos para Productos
Route::resource('productos', ProductoController::class);

// Rutas de recursos para Ventas
Route::resource('ventas', VentaController::class);

// Rutas de recursos para Facturas
Route::resource('facturas', FacturaController::class);