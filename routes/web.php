<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\IngresoController;

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


Route::resource('almacen/categoria',  CategoriaController::class);

Route::resource('almacen/articulo', ArticuloController::class );

Route::resource('almacen/persona', ClienteController::class);

Route::resource('almacen/proveedor', ProveedorController::class);

Route::resource('almacen/ingreso', IngresoController::class);


Route::get('dowload-pdf', 'App\Http\Controllers\CategoriaController@gererar_pdf')->name('descarga-pdf');




