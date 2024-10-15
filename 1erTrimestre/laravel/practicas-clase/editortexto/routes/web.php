<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller_Login;
use App\Http\Controllers\Controller_files;



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

Route::get('/login', [Controller_files::class, 'login']);

Route::get('/logout', [Controller_files::class, 'logout']);

Route::get('/home', [Controller_files::class, 'goHome']);

Route::get('/createFile', [Controller_files::class, 'createFile']);

//Route::get('/filesearch', [Controller_files::class, 'filesearch']);

Route::get('/listfiles?', [Controller_files::class, 'createFile']);


Route::any('/saveFile', [Controller_files::class, 'saveFile']);

