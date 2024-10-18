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

        $this->checkStorage($username);

        return view('/home');
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
    public function checkStorage($username){
        $contentUserDir = Storage::allDirectories("/".$username);


        session()->put('dirList', $contentUserDir);
    }

    //Crear archivos (incompleto)
    public function createFile(Request $request){

        $directoryName = $request->get('filename');
        session()->put('actualDirectory', $directoryName);

        $username = session()->get('username');
        $this->checkLogin();

        Storage::makeDirectory("/".$username."/".$directoryName."/" , 700, true);
        //Coger todos los archivos con el mismo nombre (versiones) y mandarlos como array pa que los liste text editor
        $content = $directoryName;
        return view('textEditor', compact('content'));
    }

    public function saveFile(Request $request){

        $this->checkLogin();
        $username = session()->get('username');
        //$this->checkStorage($username);

        $contenido = $request->get('textarea-content');
        $date = date("y-m-d");
        $time = date("h:i:s");
        $actualDirectory = session()->get('actualDirectory');
        $actualDirectory = basename($actualDirectory);
        $fileName = $date."_".$time."_".$actualDirectory.".txt";
        session()->forget('actualDirectory');

        //dd(basename($actualDirectory));

        Storage::put("/".$username."/".$actualDirectory."/".$fileName, $contenido);

        $this->checkStorage($username);

        return view('home');
    }

    public function listFiles(Request $request){

        $this->checkLogin();
        $username = session()->get('username');
        $directorio = $request->dirName;
        session()->put('actualDirectory', $directorio);

        $contentDir = Storage::allFiles("/".$directorio."/");

        return view('filesEspecific', compact('contentDir'));
    }

    public function editFile(Request $request){

        $username = session()->get('username');
        $this->checkLogin();
        $actualDirectory = session()->get('actualDirectory');
        $file = $request->fileGetContent;

        $content = Storage::get("/".$file);

        //dd($file);

        return view('textEditor', compact('content'));
    }

    //Queda arreglar el acceso a las páginas sin estar loggeado
    //Crear carpeta publica

    /*$content = Storage::get($filename);*/
}
