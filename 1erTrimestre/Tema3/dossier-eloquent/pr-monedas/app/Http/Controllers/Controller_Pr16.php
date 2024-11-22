<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Moneda;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller_Pr16
{
    function saveHistoricoPr16(){
        $dolar1 = Moneda::find(1);
        $historicoNuevo = new Historico();
        $historicoNuevo->fecha = '2024-11-23';
        $historicoNuevo->equivalenteeuro = 0.92;
        $dolar1->historicos()->save($historicoNuevo);

        //$dolar1->refresh();
        echo "generado: ".json_encode($historicoNuevo, JSON_UNESCAPED_UNICODE) . "<br>";
    }
}
