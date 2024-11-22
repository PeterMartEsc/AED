<?php

use App\Http\Controllers\Controller_pr14;
use App\Http\Controllers\Controller_pr15;
use App\Http\Controllers\Controller_Pr16;
use App\Http\Controllers\Controller_Pr17;
use App\Http\Controllers\Controller_pr19;
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

Route::get('/crearHistorico', [Controller_pr14::class, 'createHistorico']);

Route::get('/crearHistoricoAsociate', [Controller_pr15::class, 'crearNuevoHistoricoPr15']);

Route::get('/pr16CrearHistorico', [Controller_Pr16::class, 'saveHistoricoPr16']);

Route::get('/pr17CrearMoneda', [Controller_Pr17::class, 'crearNuevaMonedaPr17']);

Route::get('/pr17ActualizarMoneda', [Controller_Pr17::class, 'saveMonedaPr17']);

Route::get('/formPr19', function () {
    return view('Pr19formularioMonedaHistorico');
});

Route::get('/createMonedaHistorico', [Controller_pr19::class, 'createMonedaHistorico']);


