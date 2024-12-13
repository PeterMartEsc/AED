<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoDTO;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function subir(Request $request)
    {
        //suponemos que el atributo al subir se ha llamado: file
        if ($request->hasFile('file')) {
            $fichero = $request->file('file');
            $nombre = $fichero->getClientOriginalName();
            $path = $fichero->storeAs($nombre);
            return response()->json([
                'message' => 'ok, fichero subido',
                'path' => $path
            ], 200);
        }
        return response()->json([
            'message' => 'No se encontró ninguna imagen.',
        ], 400);
    }
}
