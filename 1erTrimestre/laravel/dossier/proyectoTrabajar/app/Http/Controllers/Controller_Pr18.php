<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller_Pr18 extends Controller
{
    public function crearFichero(Request $request){

        $dir = "ficheros_pr18";
        $nombreFichero = $request->get('fichero');
        $nombre = $request->get('nombre');
        $correo = $request->get('correo');


        $nombreFichero->storeAs("/".$dir);


        $contentDir = Storage::allFiles("/".$dir);

        if (($open = fopen(storage_path() . "/".$dir, "r")) !== FALSE) {

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $contenido[] = $data;
            }

            fclose($open);

            return view('Pr18_formCrearFichero', compact('contenido', 'contentDir'));
        }
    }
}
