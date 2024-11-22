<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Moneda;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller_pr15
{
    function crearNuevoHistoricoPr15(){

        $dolar1 = Moneda::find(1);

        $historicoNuevo = new Historico();
        $historicoNuevo->fecha = '2024-11-22';
        $historicoNuevo->equivalenteeuro = 0.96;
        $historicoNuevo->moneda()->associate($dolar1);
        $historicoNuevo->save();

        echo "generado: ".json_encode($historicoNuevo, JSON_UNESCAPED_UNICODE) . "<br>";
    }
}
