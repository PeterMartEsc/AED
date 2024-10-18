<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Pr11 extends Controller
{
    public function listaPalabras(){
        $listaPalabras = ['juana', 'hermana', 'comer', 'hambre', 'sueño'];

        return view ('Pr11_mostrarPalabras', compact('listaPalabras'));
    }
}
