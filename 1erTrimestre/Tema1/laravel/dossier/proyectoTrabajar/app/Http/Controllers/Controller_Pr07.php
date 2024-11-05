<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr07 extends Controller
{
    public function numPrimos(){

        $coleccion = collect([1,2,3,5,7,11,13,17,19]);
        //Pr08 {
        $hora = date('H:i:s');
        $dia = date("m-d-y");
        //Para separar los elementos obtenido del date, se pone - , . : etc
        //}
        return view('Pr07_listarPrimos', ['coleccion' => $coleccion, 'hora' => $hora]);
    }

}
