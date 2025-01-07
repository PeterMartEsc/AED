<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function upload(Request $request)
    {
        //suponemos que el atributo al subir se ha llamado: file
        if ($request->hasFile('file')) {
            dd("jajaja");
            $fichero = $request->file('file');
            $nombre = $fichero->getClientOriginalName();
            $path = $fichero->storeAs('../../public/caratulas/'.$nombre);

            return response()->json(['message' => 'ok, fichero subido','path' => $path], 200);
        }

        return response()->json(['message' => 'No se encontró ninguna imagen.'], 400);
    }
}
