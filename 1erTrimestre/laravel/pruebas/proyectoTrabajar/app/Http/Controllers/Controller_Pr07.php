<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr07 extends Controller
{
    public function numPrimos(){

        $coleccion = collect([1,2,3,5,7,11,13,17,19]);
        //Pr08
        $hora = date('H:i:s');
        return view('listarPrimos_Pr07', ['coleccion' => $coleccion, 'hora' => $hora]);
    }

}
