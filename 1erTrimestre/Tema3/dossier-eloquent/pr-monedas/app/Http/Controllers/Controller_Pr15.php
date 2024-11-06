<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller
{
    function crearNuevoHistoricoPr15(){

        $historicoNuevo = new Historico();
        $historicoNuevo->fecha = '2021-12-31';
        $historicoNuevo->equivalenteeuro = 0.89;

        //$dolar1->historicos()->save($historicoNuevo);
        //$dolar1->refresh();
        echo "generado: ".json_encode($historicoNuevo, JSON_UNESCAPED_UNICODE) . "<br>";
    }
}