<?php

use App\Http\Controllers\ActorRESTController;
use App\Http\Controllers\AuthApiController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/**
 * Rutas para login y Register
 */

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);

/**
 * Public peliculas routes
 */
Route::get('/peliculas', [PeliculaRESTController::class, 'index']);
Route::get('/peliculas/{pelicula}', [PeliculaRESTController::class, 'show']);


/**
 * Private peliculas routes
 */
Route::middleware('auth:api')->group(function () {
    Route::post('/peliculas', [PeliculaRESTController::class, 'store']);
    Route::put('/peliculas/{movie}', [PeliculaRESTController::class, 'update']);
    Route::delete('/peliculas/{movie}', [PeliculaRESTController::class, 'destroy'])->middleware('roleAdmin');
});


/**
 * Public categorias routes
 */

Route::get('/categorias', [CategoriaRESTController::class, 'index']);
Route::get('/categorias/{category}', [CategoriaRESTController::class, 'show']);


/**
 * Private categorias routes
 */

Route::middleware('auth:api')->group(function () {
    Route::post('/categorias', [CategoriaRESTController::class, 'store']);
    Route::put('/categorias/{category}', [CategoriaRESTController::class, 'update']);
    Route::delete('/categorias/{category}', [CategoriaRESTController::class, 'destroy'])->middleware('roleAdmin');
});


/**
 * Public actores routes
 */
Route::get('/actores', [ActorRESTController::class, 'index']);
Route::get('/actores/{actor}', [ActorRESTController::class, 'show']);

/**
 * Private actores routes
*/
Route::middleware('auth:api')->group(function () {
    Route::post('/actores', [ActorRESTController::class, 'store']);
    Route::put('/actores/{actor}', [ActorRESTController::class, 'update']);
    Route::delete('/actores/{actor}', [ActorRESTController::class, 'destroy'])->middleware('roleAdmin');
});



/**
 * Public directores routes
 */

Route::get('/directores', [DirectorRESTController::class, 'index']);
Route::get('/directores/{director}', [DirectorRESTController::class, 'show']);

/**
 * Private directores routes
*/
Route::middleware('auth:api')->group(function () {
    Route::post('/directores', [DirectorRESTController::class, 'store']);
    Route::put('/directores/{director}', [DirectorRESTController::class, 'update']);
    Route::delete('/directores/{director}', [DirectorRESTController::class, 'destroy'])->middleware('roleAdmin');
});




