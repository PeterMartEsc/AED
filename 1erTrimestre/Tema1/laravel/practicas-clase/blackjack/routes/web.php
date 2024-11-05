<?php

/**
 * @author Pedro Martin Escuela
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller_Juego;

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
    return view('login');
});

Route::get('/login', [Controller_Juego::class, 'procesarUsername']);

Route::get('/start', [Controller_Juego::class, 'empezarPartida']);

Route::get('/robar', [Controller_Juego::class, 'robar']);

Route::get('/plantarse', [Controller_Juego::class, 'plantarse']);



