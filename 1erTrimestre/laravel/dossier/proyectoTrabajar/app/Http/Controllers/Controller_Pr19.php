<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller_Pr19 extends Controller
{
    public function cargarFiles(){
        $archivos = Storage::allFiles("/");

        return view('Pr19_verFicheros', compact('archivos'));
    }

    public function descargarFiles(Request $request){
        $archivoDescargar = $request->get('archivo');
        return response()->download(storage_path('/'.$archivoDescargar));
    }
}
