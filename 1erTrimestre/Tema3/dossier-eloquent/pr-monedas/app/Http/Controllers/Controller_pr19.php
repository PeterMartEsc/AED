<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Moneda;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_pr19
{
    function createMonedaHistorico(Request $request){

        DB::transaction(function ($request) {

        $newMoneda = new Moneda();

        $newMoneda->nombre = $request->monedaNombre;
        $newMoneda->pais = $request->monedaPais;

        $monedaExistente = Moneda::where('nombre', '=', $request->monedaNombre)
            ->where('pais', '=', $request->monedaPais)
            ->first();

        if($monedaExistente != null){
            $newMoneda = $monedaExistente;
        } else {
            $newMoneda->save();
        }

        $newHistorico = new Historico();
        $newHistorico->moneda_id = $newMoneda->id;
        $newHistorico->equivalenteeuro = $request->equivalenteEuro;

        $newHistorico->fecha = date('Y-m-d');
        dd($newHistorico);
        $newHistorico->save();

        });
    }
}
