<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class Controller_Login
{
    public function login(Request $request){

        $username = $request->get('username');
        session()->put('username', $username);

        return redirect('/home');
    }

    public function checkLogin(){
        $username = session()->get('username');

        if(!isset($username)){
            return redirect('/login');
        }

        return view('home');
    }
}
