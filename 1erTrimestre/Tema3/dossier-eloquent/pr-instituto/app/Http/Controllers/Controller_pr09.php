<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr09
{
    function matriculasAnterior2019(){
        $matriculas = Matricula::where('year','<',2021)
            ->orderBy('year','desc')
            ->get();

        return view('Pr09_matriculas', compact('matriculas'));
    }
}
