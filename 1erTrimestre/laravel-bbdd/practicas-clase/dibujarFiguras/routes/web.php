<?php

use App\Http\Controllers\Controller_usuario;
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

Route::get("/", function (){
    return view('home');
});

Route::get("/selectLogin", function (){
    //dd("hola");
    return view('login');
})->name("pruebalogin");


Route::get("/selectRegister", function (){
    return view('register');
});

Route::get("/login", [Controller_usuario::class, 'login']);

Route::get("/register", [Controller_usuario::class, 'register']);

Route::get("/logout", [Controller_usuario::class, 'logout']);

Route::get("/game", function (){
    return view('game');
});



/*Route::get("/nuevorol", function (){
    $rolDAO = new RolDAO();
    $rol = new Rol();
    $rol->setNombre("prueba". rand(1,100));
    $resultado = $rolDAO->save($rol);
    dd($resultado);
});


Route::get("/allroles", function () {
    $rolDAO = new RolDAO();
    $roles = $rolDAO->findAll();
    dd($roles);
});


Route::get("/editrol", function () {
    $rolDAO = new RolDAO();
    $rol = (new Rol())
    ->setId(3)
    ->setNombre("modificado");
    $ok = $rolDAO->update($rol);
    if( $ok){
        echo "Rol modificado con éxito";
    }
});


Route::get("/borrarol", function () {
    $rolDAO = new RolDAO();

    $ok = $rolDAO->delete(3);
    if ($ok) {
        echo "rol borrado";
    }
});*/


