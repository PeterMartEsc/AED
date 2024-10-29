<?php

namespace App\Http\Controllers;
use App\DAO\RolDAO;
use App\DAO\UsuarioDAO;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Pasos:
 * 1.- Para usuario admin, opción de crear/eliminar usuario, añadir/eliminar figuras
 *
 * 1.- Hacer el tablero y figura contract
 * 2.- Como se guardan las imagenes en la bbdd?
 *
 *
 */

class Controller_usuario
{
    protected $usuarioDAO;
    protected $rolDAO;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->rolDAO = new RolDAO();
    }

    public function login(Request $request){

        $nombre = $request->get('nombre');

        $password = $request->get('password');

        $user = $this->usuarioDAO->findByName($nombre);

        if($user === null){
            echo "No existe usuario";
            echo "<br/><br/>";
            echo '<a href="/selectLogin">volver a hacer login</>';
            return;
        }else{

            if(Hash::check($password, $user->getPassword()) ){
                session()->put('nombre', $nombre);
            }else{
                echo "Contraseña incorrecta";
                echo "<br/><br/>";
                echo '<a href="/selectLogin">volver a hacer login</>';
                return;
            }

        }

        $rol = $user->getRol();
        session()->put('actualRol', $rol);

        return redirect('/game');
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
        $nombre = session()->get('usuario');

        if(!isset($nombre)){
            return redirect("/selectLogin");
        }

    }

    public function logout(){
        session()->flush();
        return redirect("/selectLogin");
    }



}
