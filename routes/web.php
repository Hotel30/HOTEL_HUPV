<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PromocionesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ProfileController;
use FontLib\Table\Type\name;

Route::prefix('habitaciones')->name('habitaciones.')->middleware('setCurrentSection:habitaciones')->group(function() {
    Route::get('/', [HabitacionController::class, 'index'])->name('index');
    Route::get('create', [HabitacionController::class, 'create'])->name('create');  
    Route::post('store', [HabitacionController::class, 'store'])->name('store'); 
    Route::get('edit/{id}', [HabitacionController::class, 'edit'])->name('edit'); 
    Route::put('update/{id}', [HabitacionController::class, 'update'])->name('update');  
    Route::delete('destroy/{id}', [HabitacionController::class, 'destroy'])->name('destroy'); 
});

Route::get('/', [OcupacionController::class, 'indexhabitaciones'])->name('ocupacion.index')->middleware('setCurrentSection:ocupacion');

Route::prefix('clientes')->name('clientes.')->middleware('setCurrentSection:clientes')->group(function() {
    // rutas para los clientes rol 1
    Route::get('/', [UsersController::class, 'indexClientes'])->name('index'); 
    Route::get('create', [UsersController::class, 'createCliente'])->name('create');  
    Route::post('store', [UsersController::class, 'storeCliente'])->name('store'); 
    Route::get('edit/{id}', [UsersController::class, 'editCliente'])->name('edit'); 
    Route::put('update/{id}', [UsersController::class, 'updateCliente'])->name('update');  
    Route::delete('destroy/{id}', [UsersController::class, 'destroyCliente'])->name('destroy');  
    Route::get('clientes/tabla', [UsersController::class, 'tablaClientes'])->name('tabla');
});

Route::prefix('personal')->name('personal.')->middleware('setCurrentSection:personal')->group(function() {
    // rutas para los trabajadores y administradores roles 2 y 3
    Route::get('/', [UsersController::class, 'indexPersonal'])->name('index');  
    Route::get('create', [UsersController::class, 'createPersonal'])->name('create');  
    Route::post('store', [UsersController::class, 'storePersonal'])->name('store');  
    Route::get('edit/{id}', [UsersController::class, 'editPersonal'])->name('edit');  
    Route::put('update/{id}', [UsersController::class, 'updatePersonal'])->name('update');  
    Route::delete('destroy/{id}', [UsersController::class, 'destroyPersonal'])->name('destroy');  
    Route::get('personal/tabla', [UsersController::class, 'tablaPersonal'])->name('tabla');
});

Route::prefix('inventario')->name('inventario.')->middleware('setCurrentSection:inventario')->group(function () {
    Route::get('/', [InventarioController::class, 'index'])->name('index');
    Route::get('create', [InventarioController::class, 'create'])->name('create');
    Route::post('/', [InventarioController::class, 'store'])->name('store');
    Route::get('{inventario}', [InventarioController::class, 'show'])->name('show');
    Route::get('{inventario}/edit', [InventarioController::class, 'edit'])->name('edit');
    Route::put('{inventario}', [InventarioController::class, 'update'])->name('update');
    Route::delete('{inventario}', [InventarioController::class, 'destroy'])->name('destroy');
    Route::post('/decrement/{id}', [InventarioController::class, 'decrement'])->name('decrement');
    Route::get('/restock/{id}', [InventarioController::class, 'generateRestockOrder'])->name('restock');
});

Route::get('/reporte', [InventarioController::class, 'filtroPdf'])->name('pdf')->middleware('setCurrentSection:inventario');
Route::get('/reporte/generar', [InventarioController::class, 'generarPdf'])->name('generar')->middleware('setCurrentSection:inventario');

Route::get('/reportePersonal', [PersonalController::class, 'filtrar'])->name('pedro')->middleware('setCurrentSection:personal');
Route::get('/reportePersonal/generar', [PersonalController::class, 'generate'])->name('jesus')->middleware('setCurrentSection:personal');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('setCurrentSection:profile');

Route::prefix('promociones')->name('promociones.')->middleware('setCurrentSection:marketing')->group(function () {
    Route::get('/', [PromocionesController::class, 'index'])->name('index'); 
    Route::get('/create', [PromocionesController::class, 'create'])->name('create'); 
    Route::post('/', [PromocionesController::class, 'store'])->name('store'); 
    Route::get('/{promocion}/edit', [PromocionesController::class, 'edit'])->name('edit'); 
    Route::put('/{promocion}', [PromocionesController::class, 'update'])->name('update'); 
    Route::delete('/{promocion}', [PromocionesController::class, 'destroy'])->name('destroy'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
            return redirect()->route('ocupacion.index');
        })->name('dashboard');

    
    Route::get('/estadisticas', function () {
        return view('Modulo_Reservaciones.Estadisticas');
    })->middleware('setCurrentSection:reservaciones');

    Route::get('/mapeo', function () {
        return view('Modulo_Reservaciones.Mapeo');
    })->middleware('setCurrentSection:reservaciones');

    Route::get('/facturacion', function () {
        return view('Modulo_Facturas.Dashboard');
    })->name('facturacion')->middleware('setCurrentSection:facturacion');

    Route::get('/listar', function () {
        return view('Modulo_Facturas.Listar');
    })->name('listar')->middleware('setCurrentSection:facturacion');

});

Route::get('/index', function () {
    return view('Public_Views.index');
})->name('index');

Route::get('/offers', function () {
    return view('Public_Views.ofertas');
});

Route::get('/contact', function () {
    return view('Public_Views.contacto');
})->name('contacto');

Route::get('/habitacion', function () {
    return view('Public_Views.habitacion');
});

Route::get('/hotel', function () {
    return view('Public_Views.hotel');
})->name('hotel');

require __DIR__.'/auth.php';