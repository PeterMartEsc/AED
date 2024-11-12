<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Moneda;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller_Pr17
{
    function crearNuevaMonedaPr17(){

        Moneda::create([
            'nombre' => 'dolar',
            'pais' => 'australia',
            ]);

        $moneda = Moneda::where('pais','=', 'australia')
            ->first();

        echo "generado: ".json_encode($moneda, JSON_UNESCAPED_UNICODE) . "<br>";
    }

    function saveMonedaPr17(){
        $moneda = Moneda::where('pais','=', 'australia')
            ->first();

        $moneda->pais = 'Australia';
        $moneda->save();

        echo "guardado: ".json_encode($moneda, JSON_UNESCAPED_UNICODE) . "<br>";
    }
}
