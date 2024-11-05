<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class Controller_Sopa
{
    public function empezar(){
        $letras = [];
        $min = 65;
        $max = 90;

        for($i = 1; $i<=100; $i++){
            $letras[] = chr(rand($min, $max));
        }

        //dd($letras);

        return view('home', compact('letras'));

    }

    public function mostrarPalabra(Request $request){
        $palabra = "";

        for($i=1 ; $i<=100; $i++){
            $letra = $request->get('selectorLetra');
            dd($letra);
            $palabra .= $letra;
        }

        dd($palabra);

        return view('mostrarPalabra', compact('palabra'));
    }

}
