<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PromocionesController;
use App\Http\Controllers\UsersController;

Route::prefix('clientes')->name('clientes.')->group(function() {
    // rutas para los clientes rol 1
    Route::get('/', [UsersController::class, 'indexClientes'])->name('index'); 
    Route::get('create', [UsersController::class, 'createCliente'])->name('create');  
    Route::post('store', [UsersController::class, 'storeCliente'])->name('store'); 
    Route::get('edit/{id}', [UsersController::class, 'editCliente'])->name('edit'); 
    Route::put('update/{id}', [UsersController::class, 'updateCliente'])->name('update');  
    Route::delete('destroy/{id}', [UsersController::class, 'destroyCliente'])->name('destroy');  
});

Route::prefix('personal')->name('personal.')->group(function() {
    // rutas para los trabajadores y administradores roles 2 y 3
    Route::get('/', [UsersController::class, 'indexPersonal'])->name('index');  
    Route::get('create', [UsersController::class, 'createPersonal'])->name('create');  
    Route::post('store', [UsersController::class, 'storePersonal'])->name('store');  
    Route::get('edit/{id}', [UsersController::class, 'editPersonal'])->name('edit');  
    Route::put('update/{id}', [UsersController::class, 'updatePersonal'])->name('update');  
    Route::delete('destroy/{id}', [UsersController::class, 'destroyPersonal'])->name('destroy');  
});



Route::get('/', function () {
    return view('auth.login');
 });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::prefix('promociones')->name('promociones.')->group(function () {
        Route::get('/', [PromocionesController::class, 'index'])->name('index'); 
        Route::get('/create', [PromocionesController::class, 'create'])->name('create'); 
        Route::post('/', [PromocionesController::class, 'store'])->name('store'); 
        Route::get('/{promocion}/edit', [PromocionesController::class, 'edit'])->name('edit'); 
        Route::put('/{promocion}', [PromocionesController::class, 'update'])->name('update'); 
        Route::delete('/{promocion}', [PromocionesController::class, 'destroy'])->name('destroy'); 
    });
    
    
    Route::prefix('inventario')->name('inventario.')->group(function () {
        Route::get('/', [InventarioController::class, 'index'])->name('index');//Muestra
        Route::get('create', [InventarioController::class, 'create'])->name('create');//Muestra el formulario de creacion
        Route::post('/', [InventarioController::class, 'store'])->name('store');//Almacena el producto
        Route::get('{inventario}', [InventarioController::class, 'show'])->name('show');//Muestra el producto por id
        Route::get('{inventario}/edit', [InventarioController::class, 'edit'])->name('edit');//Muestra el formulario con la informacion para editar
        Route::put('{inventario}', [InventarioController::class, 'update'])->name('update');//Actualiza un registro de producto
        Route::delete('{inventario}', [InventarioController::class, 'destroy'])->name('destroy');//Elimina un producto
    });
    
    
    Route::get('/ocupacion', [OcupacionController::class, 'index']);
    
    
    
    Route::get('/estadisticas', function () {
        return view('Modulo_Reservaciones.Estadisticas');
    });
    
    Route::get('/mapeo', function () {
        return view('Modulo_Reservaciones.Mapeo');
    });
    
    Route::get('/facturacion', function () {
        return view('Modulo_Facturas.Dashboard');
    })->name('facturacion');
    
    Route::get('/listar', function () {
        return view('Modulo_Facturas.Listar');
    })->name('listar');
    
    Route::get('/ordStock', function () {
        return view('Modulo_Reservaciones.ordenesStock');
    });
    
    Route::get('/stock', function () {
        return view('Modulo_Reservaciones.stock');
    });

    Route::get('/reporte', [InventarioController::class, 'filtroPdf'])->name('pdf');
    Route::get('/reporte/generar', [InventarioController::class, 'generarPdf'])->name('generar');

    Route::get('/reportePersonal', [PersonalController::class, 'filtrar'])->name('pedro');
    Route::get('/reportePersonal/generar', [PersonalController::class, 'generate'])->name('jesus');
});

require __DIR__.'/auth.php';


