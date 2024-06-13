<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FormasPagoController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::resource('perfiles', PerfilesController::class);
Route::resource('clientes', ClientesController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('formaspago', FormasPagoController::class);
Route::resource('productos', ProductosController::class);
Auth::routes();

// Route::get('carrito',['as'=>'carrito','uses'=>'CarritoController@show']);
// Ruta para mostrar el carrito
Route::get('/carrito', [CarritoController::class, 'show'])->name('carrito');

// Ruta para agregar un producto al carrito
Route::get('/carrito/agregar/{id}', [CarritoController::class, 'add'])->name('carrito-agregar');

Route::get('/carrito/borrar/{id}', [CarritoController::class, 'delete'])->name('carrito-borrar');

Route::get('/carrito/vaciar', [CarritoController::class, 'trash'])->name('carrito-vaciar');

Route::get('/carrito/actualizar/{id}/{cantidad?}', [CarritoController::class, 'update'])->name('carrito-actualizar');

Route::get('ordenar', [CarritoController::class, 'guardarPedido'])->name('ordenar');