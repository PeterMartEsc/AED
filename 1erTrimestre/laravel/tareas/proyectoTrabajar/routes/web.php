<?php

use Illuminate\Support\Facades\Route;
//Pr05
use App\Http\Controllers\Controller_Pr05_ListarProductos;
use App\Http\Controllers\Controller_Pr07;
use App\Http\Controllers\Controller_Pr10;
use App\Http\Controllers\Controller_Pr11;

use App\Http\Controllers\Controller_Pr12;
use App\Http\Controllers\Controller_Pr13;
use App\Http\Controllers\Controller_Pr17;
use App\Http\Controllers\Controller_Pr18;




//Ejercicios en Clase
use App\Http\Controllers\PruebaController;


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

//Pr01
       //any para todas
//Route::get('/', function () {echo "Under Construction";});

//pr02
//Route::post('/pruebita', function () {echo "se ha ejecutado una petición POST a la dirección: /pruebita";});

//pr03
//Route::any('/relatos/{numero}', function ($numero) {echo "petición recibida para el parámetro: $numero";})->where('numero', '[0-9]+');

//pr04
//Route::any('/', function () {echo "pagina raiz de nuestra aplicacion";});


//Pr05
//Route::get('/', [Controller_Pr05_ListarProductos::class, 'listarProductosGet']);
//Route::post('/', [Controller_Pr05_ListarProductos::class, 'listarProductosPost']);

//Pr07
//Route::get('/numPrimos', [Controller_Pr07::class,'numPrimos']);

//Pr09
Route::get('/time', function(){
    return view('Pr09_time');
});

//Pr10
Route::get('/numAleatorios', [Controller_Pr10::class,'numerosAleatorios100']);

//Pr11
Route::get('/listaPalabras', [Controller_Pr11::class,'listaPalabras']);

//Pr12
Route::get('/imagenes', [Controller_Pr12::class,'mostrarImagenes']);

//Pr13
Route::get('/mostrarColores', [Controller_Pr13::class,'mostrarColores']);
Route::get('/storeColores', [Controller_Pr13::class,'storeColores']);

//Pr15
Route::get('/formularioUsuario', function(){
    return view('Pr15_formularioUsuario');
});

Route::get('/almacenarInfo', [Controller_Pr15::class, 'almacenarInfo']);


//Pr17
Route::get('/crearDirectorio', function(){
    return view('Pr17_formCrearDirectorio');
});

Route::get('/procesarCrearDirectorio', [Controller_Pr17::class, 'crearDir']);

//Pr18
Route::get('/crearFichero', function(){
    return view('Pr18_formCrearFichero');
});

Route::get('/fileUpload', [Controller_Pr18::class, 'crearFichero']);








//Route::post('/formAleatorios', [PruebaController::class, 'procesarForm']);

//Ejercicios de clase
            //Ruta donde va a mostrar el return
Route::get('/formNumAleatorio', function(){
                //Devuelve la vista del archivo dentro de views llamada 'formAleatorios'
    return view('formAleatorios');
});

            //Ruta donde se van a mostrar los valores enviados por la funcion 'procesarForm'
Route::get('/procesarFormulario', [PruebaController::class, 'procesarForm']);
