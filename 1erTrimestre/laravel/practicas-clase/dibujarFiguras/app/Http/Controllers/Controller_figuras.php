<?php

namespace App\Http\Controllers;
use App\DAO\UsuarioDAO;



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

        //$usuario = new User();
        //$usuario->setUsername($username);
        //$usuario->setPassword($hashedPassword);
        //$usuario->setRol($rol);

        UsuarioDAO::save();
    }

    public function checkLogin(){
        $username = session()->get('username');

        if(!isset($username)){
            return redirect("/login");
        }

        $user = UsuarioDAO::findByName($username);

        if(!isset($user)){
            $mensaje = "Usuario no encontrado";
            return view("login", compact("mensaje"));
        }

        $passwordUser = $user->getPassword();
        $passwordSession = session()->get('password');

        if($passwordUser!= $passwordSession){
            $mensaje = "Contraseña incorrecta";
            return view("login", compact("mensaje"));
        }


        $rol = $user->getRol();
        session()->set('actualRol', $rol);
    }
}
