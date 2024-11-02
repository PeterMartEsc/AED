<?php

namespace App\Http\Controllers;
use App\DAO\RolDAO;
use App\DAO\UsuarioDAO;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller_game{

    protected $usuarioDAO;
    protected $rolDAO;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->rolDAO = new RolDAO();
    }

    function mostrarUsuarios(){

        $usuarios = $this->usuarioDAO->findAll();

        $nombres = [];
        foreach($usuarios as $usuario){
            //$usuario->getNombre();
            array_push($nombres, $usuario->getNombre());
        }

        return view('adminUsr', compact('nombres'));
    }

    function borrarUsuario(Request $request){
        $nombre = $request->get('nombre');
        $usuario = $this->usuarioDAO->findByName($nombre);

        if($nombre == session()->get('nombre')){
            echo "No puedes borrarte a ti mismo. Contata con la gestión de la bbdd para más información";
            echo '<a href="/administrarUsuarios">Volver a lista de usuarios</>';
            return;
        }

        $id = $usuario->getId();
        $this->usuarioDAO->delete($id);

        echo "Se ha eliminado el usuario '".$nombre."'";
        echo "<br/><br/>";
        echo '<a href="/administrarUsuarios">Volver a lista de usuarios</>';
        return;
    }

    function editarUsuario(Request $request){
        $nombre = $request->get('nombre');
        $usuario = $this->usuarioDAO->findByName($nombre);

        $id = $usuario->getId();
        $rol = $usuario->getRol();

        $datos = [];
        $datos[0] = $id;
        $datos[1] = $nombre;
        $datos[2] = "Introduzca nueva contraseña";
        $datos[3] = $rol;

        return view('editarUsuario', compact('datos'));
    }

    function actualizarInfoUser(Request $request){
        $id = $request->get('id');
        $usuario = $this->usuarioDAO->findById($id);

        $usuario->setId($request->get('id'));
        $usuario->setNombre($request->get('nombre'));

        $password = $request->get('password');
        if(!($password === '')){
            $passwordHashed = Hash::make($password);
            $usuario->setPassword($passwordHashed);
        }

        $usuario->setRol($request->get('rol'));

        $this->usuarioDAO->update($usuario);

        echo "<br/><br/>";
        echo "Usuario actualizado correctamente";
        echo "<br/><br/>";
        echo '<a href="/administrarUsuarios">Volver a lista de usuarios</>';
    }
}
