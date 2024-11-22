<?php

use App\Http\Controllers\Controller_pr06;
use App\Http\Controllers\Controller_pr08;
use App\Http\Controllers\Controller_pr09;
use App\Http\Controllers\Controller_pr10;
use App\Http\Controllers\Controller_pr11;
use App\Http\Controllers\Controller_pr12;
use App\Http\Controllers\Controller_pr13;
use App\Http\Controllers\Controller_pr14;
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

Route::get('/veralumno/{dni}', [Controller_pr06::class, 'findAlumnoById']);

Route::get('/veralumnos', [Controller_pr08::class, 'findAllAlumnos']);

Route::get('/matriculas/antes/2019', [Controller_pr09::class, 'matriculasAnterior2019']);

Route::get('/matriculasComparar', [Controller_pr10::class, 'matriculasComparar']);

Route::get('/matriculasContar', [Controller_pr11::class, 'matriculasContar']);

Route::get('/saveNuevaAsignatura', [Controller_pr12::class, 'saveNuevaAsignatura']);

Route::get('/createNuevaAsignatura', [Controller_pr12::class, 'createNuevaAsignatura']);

Route::get('/intercambiarAsignaturasCurso', [Controller_pr13::class, 'updateAsignaturasPr12']);


