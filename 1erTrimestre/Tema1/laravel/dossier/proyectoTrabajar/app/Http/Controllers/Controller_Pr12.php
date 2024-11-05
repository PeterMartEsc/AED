<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr12 extends Controller
{                   //Aquí llega el get del formAleatorios y recibe un request de formAleatorios
    public function mostrarImagenes(){

    $img1 = "/img_pr12/img1.png";
    $img2 = "/img_pr12/img2.png";
    $img3 = "/img_pr12/img3.png";
    $img4 = "/img_pr12/img4.png";
    return view('Pr12_mostrarImagenes', compact('img1', 'img2', 'img3', 'img4'));

    }
}
