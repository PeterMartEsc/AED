<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class Controller_pr06
{
    function findAlumnoById($dni){
        //$id = '12312312K';
        $alumno = Alumno::find($dni);

        //json_encode($alumno, JSON_UNESCAPED_UNICODE);

        return view('alumnoMostrar', compact('alumno'));
    }
}
