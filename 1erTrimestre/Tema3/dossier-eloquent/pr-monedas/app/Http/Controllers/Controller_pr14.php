<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Illuminate\Http\Request;

class Controller_pr14
{
    function createHistorico(){

        $historico = new Historico();
        $historico->moneda_id = 1;
        $historico->equivalenteeuro = 0.94;
        $historico->fecha = '2024-11-20';

        Historico::create([
            'moneda_id' => $historico->moneda_id,
            'equivalenteeuro' => $historico->equivalenteeuro,
            'fecha' => $historico->fecha
        ]);

        echo "Historico creado correctamente";
        var_dump($historico->getAttributes());
    }


}

