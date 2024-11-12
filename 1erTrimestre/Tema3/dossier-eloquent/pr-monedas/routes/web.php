<?php

use App\Http\Controllers\Controller_Pr16;
use App\Http\Controllers\Controller_Pr17;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/pr16CrearHistorico', [Controller_Pr16::class, 'saveHistoricoPr17']);

Route::get('/pr17CrearMoneda', [Controller_Pr17::class, 'crearNuevaMonedaPr17']);

Route::get('/pr17ActualizarMoneda', [Controller_Pr17::class, 'saveMonedaPr17']);

