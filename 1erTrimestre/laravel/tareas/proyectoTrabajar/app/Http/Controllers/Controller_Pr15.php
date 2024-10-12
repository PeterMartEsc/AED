<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr07 extends Controller
{
    public function almacenarInfo(Request $request){

        if(isset($edad) || isset($email) || isset($name)){
            $name = $request->get('name');
            $edad = $request->get('edad');
            $email = $request->get('email');
        }

    }

}
