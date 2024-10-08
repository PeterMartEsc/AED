<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mazo;

class Juego
{
    public function procesarUsername(Request $request){

        $username = $request->get('usuario');
        if(!isset($username)){
            return view('login');
        }
        session()->put('username', $username);
        return view('index', compact('username'));
    }

    public function empezarPartida(){
        $mazo = new Mazo();

        $mazo.barajar();
    }
}
