<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller_Pr17 extends Controller
{
    public function crearDir(Request $request){

        $nombreDirectorio = $request->get('nombreDirectorio');
        if(!isset($nombreDirectorio)){
            return view ('Pr17_formCrearDirectorio');
        }                      //(RutaFichero, Permisos, SeCreanDirInexistentes?)
        Storage::makeDirectory("/".$nombreDirectorio , 0755, true);
        //$ficheros = Storage::allFiles("/" . $nombreDirectorio);
        //return view('Pr17_listarFicheros',compact('ficheros'));
    }
}
