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

Route::get('/login', [Controller_Login::class, 'login']);

Route::get('/home', [Controller_Login::class, 'checkLogin']);

Route::get('/createFile', [Controller_files::class, 'createFile']);
