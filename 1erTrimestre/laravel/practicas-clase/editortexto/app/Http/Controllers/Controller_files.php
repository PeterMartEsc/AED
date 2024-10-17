<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class Controller_files
{
    //Hace el login
    public function login(Request $request){

        $username = $request->get('username');
        session()->put('username', $username);

        $this->comprobarArchivos($username);
        //dd(session()->get('dirList'));

        return redirect('/home');
    }

    //Va al home
    public function goHome(){
        $this->checkLogin();
        return view('home');
    }

    //Compruebas si estás logeado
    public function checkLogin(){
        $username = session()->get('username');

        if(!isset($username)){
            return redirect('/login');
        }
    }

    //Cierra sesion
    public function logout(){
        session()->flush();
        return view('/login');
    }

    //Comprueba la lista de carpetas existentes para el usuario
    public function comprobarArchivos($username){
        $contentUserDir = Storage::allDirectories("/".$username);
        //dd($contentUserDir);

        session()->put('dirList', $contentUserDir);
        //dd(session()->get('dirList'));
    }

    //Crear archivos (incompleto)
    public function createFile(Request $request){

        $directoryName = $request->get('filename');

        $username = session()->get('username');
        $this->checkLogin();

        Storage::makeDirectory("/".$username."/".$directoryName."/" , 700, true);
        //Coger todos los archivos con el mismo nombre (versiones) y mandarlos como array pa que los liste text editor

        return view('textEditor', compact('directoryName'));
    }

    //Busca y pone a editar la version deseada
    /*public function filesearch(Request $request){
        $this->checkLogin();
        $filename = $request->get('filesearch');
    }*/

    public function saveFile(Request $request){
        //Guardar archivo de la forma especificada

        $this->checkLogin();
        $username = session()->get('username');
        $this->comprobarArchivos($username);

        $contenido = $request->get('contenido');

        //Guardar contenido en archivo con nombre especifico

        return view('home');
    }

    //Entrar a editar un archivo con su getContent como value
    //Al entrar a editar un archivo, mostrar la versión más reciente, y debajo listar las versiones anteriores


    /*$content = Storage::get($filename);*/
}
