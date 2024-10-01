<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ListarProductos extends Controller
{

    public function listarProductosGet(){
        echo "Ejecutando el controlador ListarProductos mediante get";
    }

    public function listarProductosPost(){
        echo "Ejecutando el controlador ListarProductos mediante post";
    }


}