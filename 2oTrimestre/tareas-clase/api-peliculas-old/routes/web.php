<?php

use Illuminate\Http\Request;
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

Route::get("/basica", function(Request $request){

    $authHeader = $request->header('Authorization');
    if(!$authHeader){
        return response('Unauthorized', 401)
                ->header('WWW-Authenticate', 'Basic realm="Acceso al recurso protegido"');

    }else {
        $decoded = base64_decode(substr($authHeader, 6));
        echo $decoded;
        die();

    }

});

