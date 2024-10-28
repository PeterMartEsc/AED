<?php

namespace App\Http\Controllers;
use App\DAO\RolDAO;
use App\DAO\UsuarioDAO;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Pasos:
 * 1.- Comprobar el Login y Register
 * 2.- Hacer el tablero y figura contract
 * 3.- Como se guardan las imagenes en la bbdd?
 *
 * - Dar estilo al login, register, home y game
 */

class Controller_figuras
{
    protected $usuarioDAO;
    protected $rolDAO;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->rolDAO = new RolDAO();
    }

    public function login(Request $request){

        $nombre = $request->get('nombre');
        session()->put('nombre', $nombre);

        $password = $request->get('password');
        $paswordHashed = Hash::make($password);
        session()->put('password', $paswordHashed);

        $this->checkLogin();

        return view('game');
    }

    public function register(Request $request){

        /*$request->validate()([
            'nombre' => 'required|string|max:100',
            'password' => 'required|string',
        ]);*/


        $nombre = $request->get('nombre');
        $password = $request->get('password');

        $hashedPassword = Hash::make($password);

        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setPassword($hashedPassword);

        $rolUsuario = $this->rolDAO->findById(1);
        $rolName = $rolUsuario->getNombre();

        $usuario->setRol($rolName);

        //dd($usuario);
        $this->usuarioDAO->save($usuario);
        $mensajeRegister = "Se ha registrado correctamente";

        return view("login", compact('mensajeRegister'));
    }

    public function checkLogin(){
        $nombre = session()->get('nombre');

        if(!isset($nombre)){
            return redirect("/selectLogin");
        }

        $user = $this->usuarioDAO->findByName($nombre);

        if($user === null){
            $mensajeUser = "Usuario no encontrado";
            //dd($user);
            return redirect("/selectLogin")->with('mensajeUser', $mensajeUser);
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

    public function logout(){
        session()->flush();
        return redirect("/selectLogin");
    }



}
