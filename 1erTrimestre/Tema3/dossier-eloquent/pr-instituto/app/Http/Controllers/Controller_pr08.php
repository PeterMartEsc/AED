<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr08
{
    function findAllAlumnos(){

        $alumnos = Alumno::all();

        return view('Pr08_allAlumnos', compact('alumnos'));
    }
}
