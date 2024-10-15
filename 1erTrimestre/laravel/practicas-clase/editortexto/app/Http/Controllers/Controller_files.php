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

        return view('home');
    }
}
