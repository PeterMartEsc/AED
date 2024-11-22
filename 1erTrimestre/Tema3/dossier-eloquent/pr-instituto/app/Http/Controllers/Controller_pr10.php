<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr10
{
    function matriculasComparar(){
        $matriculasGet = Matricula::where('year','<',2021)
            ->orderBy('year','desc')
            ->take(1)
            ->get();

        $matriculasFirst = Matricula::where('year','<',2021)
        ->orderBy('year','desc')
        ->take(1)
        ->first();

        dd($matriculasGet, $matriculasFirst);

    }
}
