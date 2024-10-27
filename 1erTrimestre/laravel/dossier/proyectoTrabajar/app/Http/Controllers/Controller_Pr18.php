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

        //Storage::put("/".$nombreFichero.".csv", $contenido);

        $data = [$nombre,$correo];
        $csvLine = implode(',', $data) . "\n";

        // Guardar o añadir la línea al archivo CSV. El append toma como base storage/app
        Storage::append($dir."/".$nombreFichero.".csv", $csvLine);

        return view('Pr18_formCrearFichero');

    }
}
