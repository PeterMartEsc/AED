<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class Controller_pr13
{
    function updateAsignaturasPr12(){

        $asignatura1 = Asignatura::find(9);
        $asignatura2 = Asignatura::find(10);

        $asignatura1->curso = "2º DAM";
        $asignatura2->curso = "1º DAM";
        echo "Ejecutando el 'update' de la asignatura. La de 1º pasa a ser de 2º y viceversa";
        echo "<br/><br/>";
        echo $asignatura1;
        echo "<br/><br/>";
        echo $asignatura2;
        echo "<br/><br/>";
        $asignatura1->save();
        $asignatura2->save();
    }


}

