<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PruebaController extends Controller
{                   //Aquí llega el get del formAleatorios y recibe un request de formAleatorios
    public function procesarForm(Request $request){

        $vueltas = $request->input('vueltas')??null;
        $min = $request->input('min')??null;
        $max = $request->input('max')??null;

        //Devuelve la asignacion de los valores a la view llamada 'verRewsultados'
        return view('verResultados',[
            'vueltas' => $vueltas,
            'min' => $min,
            'max' => $max
        ]);


    }


}
