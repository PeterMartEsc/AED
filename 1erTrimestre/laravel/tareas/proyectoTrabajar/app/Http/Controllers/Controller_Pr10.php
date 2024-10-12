<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Pr10 extends Controller
{
    public function numerosAleatorios100(){
        $listaAleatorios = [];

        for($i = 0 ; $i< 10 ; $i++){
            $listaAleatorios[$i] = rand(0,100);
            //$listaAleatorios[] = rand(0,100);     //Sirve igual
        }

        return view ('Pr10_mostrarNumerosAleatorios', compact('listaAleatorios'));
    }
}
