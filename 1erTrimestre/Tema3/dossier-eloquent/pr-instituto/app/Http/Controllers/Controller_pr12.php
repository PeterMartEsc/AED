<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class Controller_pr12
{
    function saveNuevaAsignatura(){

        $asignatura = new Asignatura();
        $asignatura->id = 9;
        $asignatura->nombre = "EjemploAsignatura1";
        $asignatura->curso = "1º DAM";
        echo "Ejecutando el 'save' de la asignatura";
        var_dump($asignatura->getAttributes());
        $asignatura->save();
    }

    function createNuevaAsignatura(){

        $asignatura = new Asignatura();
        $asignatura->id = 10;
        $asignatura->nombre = "EjemploAsignatura2";
        $asignatura->curso = "2º DAM";

        echo "Ejecutando la 'creacion' de la asignatura";
        var_dump($asignatura->getAttributes());

        Asignatura::create([
            'nombre' => $asignatura->nombre,
            'curso' => $asignatura->curso
        ]);
    }
}
