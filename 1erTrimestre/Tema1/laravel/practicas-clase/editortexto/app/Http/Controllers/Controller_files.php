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
        $contentPubicDir = Storage::allDirectories("/public"."/");


        session()->put('dirList', $contentUserDir);
        session()->put('publicDirList', $contentPubicDir);
    }

    //Crear archivos (incompleto)
    public function createFile(Request $request){

        $directoryName = $request->get('filename');
        session()->put('actualDirectory', $directoryName);

        $username = session()->get('username');
        $this->checkLogin();

        Storage::makeDirectory("/".$username."/".$directoryName."/" , 700, true);
        
        $content = $directoryName;
        return view('textEditor', compact('content'));
    }

    public function createPublicFile(Request $request){

        $directoryName = $request->get('filename');
        session()->put('actualDirectory', $directoryName);

        $username = session()->get('username');
        $this->checkLogin();

        Storage::makeDirectory("/"."public"."/".$directoryName."/" , 700, true);

        $content = $directoryName;

        session()->put('trabajandoPublico', 'true');
        return view('textEditor', compact('content'));
    }

    public function saveFile(Request $request){

        $publica = session()->get('trabajandoPublico');
        if(isset($publica)){
            return $this->savePublicFile($request);
        }

        $this->checkLogin();
        $username = session()->get('username');

        $contenido = $request->get('textarea-content');
        $date = date("y-m-d");
        $time = date("h-i-s");
        $actualDirectory = session()->get('actualDirectory');
        $actualDirectory = basename($actualDirectory);

        $fileName = $date."_".$time."_".$actualDirectory.".txt";

        session()->forget('actualDirectory');
        session()->forget('trabajandoPublico');

        Storage::put("/".$username."/".$actualDirectory."/".$fileName, $contenido);

        $this->checkStorage($username);

        return view('home');
    }

    public function savePublicFile(Request $request){

        $this->checkLogin();
        $username = session()->get('username');
        //$this->checkStorage($username);

        $contenido = $request->get('textarea-content');
        $date = date("y-m-d");
        $time = date("h-i-s");
        $actualDirectory = session()->get('actualDirectory');
        $actualDirectory = basename($actualDirectory);

        $fileName = $date."_".$time."_".$actualDirectory.".txt";
        session()->forget('actualDirectory');

        //dd(($actualDirectory));

        Storage::put("/"."public"."/".$actualDirectory."/".$fileName, $contenido);
        //dd(("/"."public"."/".$actualDirectory."/".$fileName));

        session()->forget('trabajandoPublico');

        $this->checkStorage($username);

        return view('home');
    }

    public function listFiles(Request $request){

        $this->checkLogin();
        $username = session()->get('username');
        $directorio = $request->dirName;
        session()->put('actualDirectory', $directorio);

        $contentDir = Storage::allFiles("/".$directorio."/");
        rsort($contentDir);

        return view('filesEspecific', compact('contentDir'));
    }

    public function listPublicFiles(Request $request){

        $this->checkLogin();
        $username = session()->get('username');
        $directorio = $request->publicDirList;
        session()->put('actualDirectory', $directorio);

        $contentDir = Storage::allFiles("/".$directorio."/");
        rsort($contentDir);

        return view('publicFilesEspecific', compact('contentDir'));
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

    public function editPublicFile(Request $request){

        $username = session()->get('username');
        $this->checkLogin();
        $actualDirectory = session()->get('actualDirectory');
        $file = $request->fileGetContent;
        session()->put('trabajandoPublico', 'true');

        $content = Storage::get("/".$file);

        //dd($file);

        return view('textEditor', compact('content'));
    }


    /*$content = Storage::get($filename);*/
}
