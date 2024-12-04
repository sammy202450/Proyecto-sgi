<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inventarioController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make som127ething great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventario', [inventarioController::class, 'index'])->name('index-inv');

Route::get('/inventario/create', [inventarioController::class, 'create'])->name('create-inv');

Route::post('/inventario', [inventarioController::class, 'store'])->name('store-inv');

Route::get('/inventario/{id}/edit', [inventarioController::class, 'edit'])->name('edit-inv');

Route::put('/inventario/{id}', [inventarioController::class, 'update'])->name('update-inv');

Route::delete('/inventario/{id}', [inventarioController::class, 'destroy'])->name('destroy-inv');

Route::get('/oficinas', [OficinaController::class, 'index'])->name('index-ofi');


//USER 

Route::view('/login',"usuarios/login")->name('login');
Route::view('/registro',"usuarios/register")->name('registro');
Route::view('/privada',"usuarios/secret")->middleware('auth')->name('privada');

Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
Route::post('/inicia-sesion',[LoginController::class,'login'])->name('inicia-sesion');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');