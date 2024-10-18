<?php

use App\Http\Controllers\Controller_Sopa;
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


Route::get('/', [Controller_Sopa::class, 'empezar']);

Route::get('/mostrarPalabra', [Controller_Sopa::class, 'mostrarPalabra']);


/*Route::get('/asdfafasdf', function () {
    return view('login');
});*/
