<?php

/**
 * @author Pedro Martin Escuela
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Juego;

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

Route::get('/login', [Juego::class, 'procesarUsername']);

Route::get('/start', [Juego::class, 'empezarPartida']);

