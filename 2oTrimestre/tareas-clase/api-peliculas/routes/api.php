<?php

use App\Http\Controllers\ActorRESTController;
use App\Http\Controllers\CategoriaRESTController;
use App\Http\Controllers\DirectorRESTController;
use App\Http\Controllers\PeliculaRESTController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('peliculas', PeliculaRESTController::class);

Route::apiResource('actores', ActorRESTController::class);

Route::apiResource('categorias', CategoriaRESTController::class);

Route::apiResource('directores', DirectorRESTController::class);


