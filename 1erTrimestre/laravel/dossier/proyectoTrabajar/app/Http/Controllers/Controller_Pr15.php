<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr15 extends Controller
{

    public function almacenarInfo(Request $request){

            $name = $request->get('name');
            session()->put('name', $name);
            $edad = $request->get('edad');
            session()->put('edad', $edad);
            $email = $request->get('email');
            session()->put('email', $email);

        return view('Pr15_formularioUsuario');

    }

}
