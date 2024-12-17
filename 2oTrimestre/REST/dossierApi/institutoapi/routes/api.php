<?php

use App\Http\Controllers\AlumnoRESTController;
use App\Http\Controllers\AsignaturaRESTController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MatriculaRESTController;
use Illuminate\Http\Request;
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

Route::apiResource('alumnos', AlumnoRESTController::class)->middleware('roladmin');
Route::apiResource('matriculas', MatriculaRESTController::class)->middleware('roladmin');
Route::apiResource('asignaturas', AsignaturaRESTController::class)->middleware('roladmin');

Route::post('upload', [ImagesController::class, 'subir']);

//Auth
Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);
