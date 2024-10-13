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

        //dd($partida);

        /*// Obtener todos los datos de la sesión
        $sessionData = session()->all();

        // Mostrar los datos de la sesión (por ejemplo, para depuración)
        dd($sessionData);*/


        $carta = $partida->robarCarta($puntero);

        $partida->getJugador()->addCarta($carta);

        $puntero++;

        $carta = $partida->robarCarta($puntero);
        $partida->getCuprier()->addCarta($carta);


        session()->put('puntero', $puntero);
        session()->put('partida', $partida);

        return view('index', compact('partida'));
    }

    public function plantarse(){

        $partida = session()->get('partida');
        $puntuacion = $partida->getJugador()->getPuntuacion();

        $ases = 0;

        $manoJugador = $partida->getJugador()->getArrayMano();

        if($puntuacion > 21 && (in_array('As', $manoJugador))){

            foreach($partida->getJugador()->getArrayMano() as $carta){
                if($carta->getValor() == 'As'){
                    $ases++;
                }
            }

            while($ases > 0){
                $puntuacion -= 10;
                $ases--;
            }
        }

        $resultado = $this->comprobar($puntuacion);

        session()->put('resultado', $resultado);

        return view('index');

    }

    public function comprobar($puntuacionJugador){

        switch($puntuacionJugador){
            case ($puntuacionJugador > 21):
                $resultado = "Has perdido, tu puntuación es de: " . $puntuacionJugador;
                break;
            case ($puntuacionJugador = 21):
                $resultado = "¡Has ganado! , tu puntuación es de: " . $puntuacionJugador;
                break;
            case ($puntuación < 21):
                $resultado = $this->compararConCuprier($puntuacionJugador);
                break;
        }

        return $resultado;
    }

    public function compararConCuprier($puntuacionJugador){

        $partida = session()->get('partida');
        $puntuacionCuprier = $partida->getCuprier()->getPuntuacion();

        if($puntuacionJugador > $puntuacionCuprier){
            return "Has ganado, tu puntuación es de: " . $puntuacionJugador. " y la puntuación del cuprier es de: ". $puntuacionCuprier;
        } else {
            return "Has perdido, tu puntuación es de: " . $puntuacionJugador. " y la puntuación del cuprier es de: ". $puntuacionCuprier;
        }
    }
}
