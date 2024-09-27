<?php

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

       //any para todas
Route::get('/', function () {
    echo "Under Construction";
    //return view('welcome');
});

//pr02
Route::post('/pruebita', function () {
    echo "se ha ejecutado una petición POST a la dirección: /pruebita";
    //return view('welcome');
});

//pr03
Route::any('/relatos/{numero}', function ($numero) {
    echo "petición recibida para el parámetro: $numero";
    //return view('welcome');
})->where('numero', '[0-9]+');

//pr04
Route::any('/', function () {
    echo "pagina raiz de nuestra aplicacion";
    //return view('welcome');
});
