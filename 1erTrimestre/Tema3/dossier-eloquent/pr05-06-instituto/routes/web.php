<?php

use App\Http\Controllers\Controller_pr06;
use App\Http\Controllers\Controller_pr12;
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

Route::get('/saveNuevaAsignatura', [Controller_pr12::class, 'saveNuevaAsignatura']);

Route::get('/createNuevaAsignatura', [Controller_pr12::class, 'createNuevaAsignatura']);

