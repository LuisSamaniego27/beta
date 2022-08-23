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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('paises', App\Http\Controllers\PaisController::class)->middleware('auth');
//Route::get('/paises/{pais}', [App\Http\Controllers\PaisController::class, 'show'])->name('paises.show');

Route::resource('estados', App\Http\Controllers\EstadoController::class)->middleware('auth');
Route::resource('preinscripciones', App\Http\Controllers\PreinscripcionController::class)->middleware('auth');
Route::resource('barrios', App\Http\Controllers\BarrioController::class)->middleware('auth');
Route::resource('sociedades', App\Http\Controllers\SociedadController::class)->middleware('auth');
Route::resource('personas', App\Http\Controllers\PersonaController::class)->middleware('auth');

Route::get('/crearpersona/{id}', 'App\Http\Controllers\PreinscripcionController@crearpersona')->name('preinscripciones.crearpersona');


Route::get('/mapa', function () {
    return view('preinscripcion.mapa');
 });




