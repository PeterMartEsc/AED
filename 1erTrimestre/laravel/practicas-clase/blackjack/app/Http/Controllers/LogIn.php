<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LogIn
{
    public function procesarUsername(Request $request){

        $username = $request->get('usuario');
        if(!isset($username)){
            return view('login');
        }
        session()->put('username', $username);
        return view('index', compact('username'));
    }
}
