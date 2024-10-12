<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr13 extends Controller
{
    public function storeColores(Request $request){
        $color = $request->get('color');

        if(!isset($color)){
            $colores = session()->get('colores');
            return view('Pr13_mostrarColores', compact('colores'));
        }

        $colores = session()->get('colores');

        array_push($colores, $color);
        session()->put('colores', $colores);

        return view('Pr13_mostrarColores', compact('colores'));
    }

    //Aquí llega el get del formAleatorios y recibe un request de formAleatorios
    public function mostrarColores(){

        if(!isset($colores)){
            $colores = [];
            session()->put('colores', $colores);
        }

        return view('Pr13_mostrarColores', compact('colores'));

    }
}
