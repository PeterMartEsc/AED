<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\Controller_Pr12;


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
    //pr01
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

//Ejercicios de clase
            //Ruta donde va a mostrar el return
Route::get('/formNumAleatorio', function(){
                //Devuelve la vista del archivo dentro de views llamada 'formAleatorios'
    return view('formAleatorios');
});

            //Ruta donde se van a mostrar los valores enviados por la funcion 'procesarForm'
Route::get('/procesarFormulario', [PruebaController::class, 'procesarForm']);


Route::get('/imagenes/pr12', [Controller_Pr12::class,'mostrarImagenes']);



