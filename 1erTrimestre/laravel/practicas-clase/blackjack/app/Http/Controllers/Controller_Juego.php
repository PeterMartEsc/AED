<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mazo;
use App\Models\Partida;
use App\Models\Jugador;



class Controller_Juego
{
    public function procesarUsername(Request $request){

        $username = $request->get('usuario');
        if(!isset($username)){
            return view('login');
        }
        session()->put('username', $username);

        return view('index');
    }

    public function empezarPartida(){

        if(session()->get('resultado') !== null){
            session()->forget('resultado');
        }

        $jugador = new Jugador();
        $jugador->setName('Yo');

        $cuprier = new Jugador();
        $cuprier->setName('Cuprier');


        $partida = new Partida();
        $partida->setJugador($jugador);
        $partida->setCuprier($cuprier);

        $puntero = 0;

        for ($i = 0; $i <= 3; $i++) {

            if ($i < 2) {
                $carta = $partida->robarCarta($puntero);
                $partida->getJugador()->addCarta($carta); // Añade la carta al jugador mediante metodo en Jugador
            }

            if ($i >= 2) {
                $carta = $partida->robarCarta($puntero);
                $partida->getCuprier()->addCarta($carta); // Añade la carta al cuprier mediante metodo en Jugador
            }

            $puntero++;
        }

        session()->put('partida', $partida);

        session()->put('puntero', $puntero);

        return view('index', compact('partida'));

    }

    public function robar(){

        $puntero = session()->get('puntero');
        $partida = session()->get('partida');


        $carta = $partida->robarCarta($puntero);
        $partida->getJugador()->addCarta($carta);

        $puntero++;



        if(!(($partida->getCuprier()->getPuntuacion()) > 16)){

            $carta = $partida->robarCarta($puntero);
            $partida->getCuprier()->addCarta($carta);
            $puntero++;
        }


        session()->put('puntero', $puntero);
        session()->put('partida', $partida);

        return view('index', compact('partida'));
    }

    public function plantarse(){

        $partida = session()->get('partida');
        $puntuacion = $partida->getJugador()->getPuntuacion();
        $manoJugador = $partida->getJugador()->getArrayMano();

        $puntuacion = $this->comprobarAses($manoJugador, $puntuacion);

        /*$ases = 0;
        $hayAs = false;

        foreach ($manoJugador as $carta) {
            if ($carta->getValor() === 'As') {
                $hayAs = true;
                $ases++;
            }
        }


        if($puntuacion > 21 && ($hayAs)){

            while($ases > 0){
                $puntuacion -= 10;
                $ases--;
            }

        }*/

        $resultado = $this->comprobar($puntuacion);

        session()->put('resultado', $resultado);

        return view('index', compact('partida'));

    }

    public function comprobarAses($mano, $puntuacion){

        $ases = 0;
        $hayAs = false;

        foreach ($mano as $carta) {
            if ($carta->getValor() === 'As') {
                $hayAs = true;
                $ases++;
            }
        }


        if($puntuacion > 21 && ($hayAs)){

            while($ases > 0){
                $puntuacion -= 10;
                $ases--;
            }

        }

        return $puntuacion;
    }

    public function comprobar($puntuacionJugador){

        switch($puntuacionJugador){
            case ($puntuacionJugador > 21):
                $resultado = "Has perdido, tu puntuación es de: " . $puntuacionJugador;
                break;
            case ($puntuacionJugador == 21):
                //dd($puntuacionJugador);
                $resultado = "¡Has ganado! , tu puntuación es de: " . $puntuacionJugador;
                break;
            case ($puntuacionJugador < 21):
                $resultado = $this->compararConCuprier($puntuacionJugador);
                break;
        }

        return $resultado;
    }

    public function compararConCuprier($puntuacionJugador){

        $partida = session()->get('partida');
        $puntuacionCuprier = $partida->getCuprier()->getPuntuacion();

        $manoCuprier = $partida->getCuprier()->getArrayMano();

        $puntuacionCuprier = $this->comprobarAses($manoCuprier, $puntuacionCuprier);

        if($puntuacionJugador > $puntuacionCuprier || $puntuacionCuprier > 21){
            return "Has ganado, tu puntuación es de: " . $puntuacionJugador. " y la puntuación del cuprier es de: ". $puntuacionCuprier;
        } else {
            return "Has perdido, tu puntuación es de: " . $puntuacionJugador. " y la puntuación del cuprier es de: ". $puntuacionCuprier;
        }
    }
}
