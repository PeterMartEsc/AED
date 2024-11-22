<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr11
{
    function matriculasContar(){
        $matriculas = Matricula::all();

        echo "Cantidad de matrículas".$cantidadAsignaturas=(count($matriculas));
        echo "<br/>";
        echo "<br/>";
        echo $matriculas;


        //dd($matriculas);
    }
}
