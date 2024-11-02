<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\DashboardController;

// Rutas de Autenticación
Route::get('/', [AuthController::class, 'mostrarFormularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::delete('productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


    // Dashboard y productos accesibles para ambos roles
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('role')
        ->name('dashboard');

    Route::get('productos', [ProductoController::class, 'index'])
        ->middleware('role')
        ->name('productos.index');
    

    // Rutas exclusivas para Administrador
    Route::middleware('role')->group(function () {
        Route::put('productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
        Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
        Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
        Route::post('productos/{id}/aumentar', [ProductoController::class, 'aumentar'])->name('productos.aumentar');
        Route::post('productos/{id}/toggle', [ProductoController::class, 'toggleStatus'])->name('productos.toggle');
        Route::get('historial', [MovimientoController::class, 'index'])->name('movimientos.historial');

        Route::get('productos/{id}/agregar-inventario', [ProductoController::class, 'agregarInventario'])->name('productos.agregarInventario');


        Route::post('productos/{id}/guardar-inventario', [ProductoController::class, 'guardarInventario'])->name('productos.guardarInventario');
 
    });

    // Rutas exclusivas para Almacenista
    Route::middleware('role')->group(function () {
        Route::get('salida-productos', [MovimientoController::class, 'crearSalida'])->name('movimientos.salida');
        Route::post('salida-productos', [MovimientoController::class, 'guardarSalida'])->name('movimientos.guardarSalida');
    });
});
