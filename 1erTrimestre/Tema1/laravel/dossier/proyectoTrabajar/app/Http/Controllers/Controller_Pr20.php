<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller_Pr20 extends Controller
{
    public function cargarFiles(){
        $archivos = Storage::allFiles("/");

        return view('Pr20_verFiles', compact('archivos'));
    }

    public function deleteFiles(Request $request){
        $archivoDescargar = $request->get('archivo');
        if(Storage::exists($archivoDescargar)){
            Storage::delete($archivoDescargar);
        }
        return "eliminado".$archivoDescargar;
    }
}
