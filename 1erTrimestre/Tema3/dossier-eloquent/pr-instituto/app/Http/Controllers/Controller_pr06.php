<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr06
{
    function findAlumnoById($dni){
        //$id = '12312312K';
        DB::connection()->enableQueryLog();
        $alumno = Alumno::find($dni);
        $lastQuery = DB::getQueryLog();
        dd($lastQuery);
        json_encode($alumno, JSON_UNESCAPED_UNICODE);

        return view('alumnoMostrar', compact('alumno'));
    }
}
