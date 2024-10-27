<?php

namespace App\Http\Controllers;
use App\DAO\UsuarioDAO;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Pasos:
 * 0.- Cambiar username por nombre en todos los campos
 * 1.- Hacer la clase Usuario y Rol
 * 2.- Comprobar el Login y Register
 * 3.- Hacer el tablero y figura contract
 * 4.- Como se guardan las imagenes en la bbdd?
 *
 * - Dar estilo al login, register, home y game
 */

class Controller_figuras
{
    public function login(Request $request){
        $username = $request->get('username');
        session()->set('username', $username);
        $password = $request->get('password');
        $paswordHashed = Hash::make($password);
        session()->set('password', $paswordHashed);

        $this->checkLogin();

        return view('game');
    }

    public function register(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');

        $hashedPassword = Hash::make($password);

        //$usuario = new Usuario();
        //$usuario->setUsername($username);
        //$usuario->setPassword($hashedPassword);
        //$usuario->setRol($rol);

        //UsuarioDAO::save($usuario);
    }

    public function checkLogin(){
        $username = session()->get('username');

        if(!isset($username)){
            return redirect("/login");
        }

        //$user = UsuarioDAO::findByName($username);

        if(!isset($user)){
            $mensajeUser = "Usuario no encontrado";
            return view("login", compact("mensajeUser"));
        }

        $passwordUser = $user->getPassword();
        $passwordSession = session()->get('password');

        if($passwordUser!= $passwordSession){
            $mensajePassw = "Contraseña incorrecta";
            return view("login", compact("mensajePassw"));
        }


        $rol = $user->getRol();
        session()->set('actualRol', $rol);
    }
}
