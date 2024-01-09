<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('autenticacao');



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('autenticacao');


Route::resource('clientes', ClienteController::class)->middleware('autenticacao');
Route::resource('marcas', MarcaController::class)->middleware('autenticacao');
Route::resource('modelos', ModeloController::class)->middleware('autenticacao');
Route::resource('carros', CarroController::class)->middleware('autenticacao');
Route::resource('locacoes', LocacaoController::class)->middleware('autenticacao');