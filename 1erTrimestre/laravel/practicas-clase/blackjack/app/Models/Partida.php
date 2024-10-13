<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mazo;
use App\Models\Jugador;


class Partida extends Model
{
    use HasFactory;

    /** @var Jugador[] */
    public $jugador;

    /** @var Jugador[]*/
    public $cuprier;

    /** @var Mazo[] */
    public $mazo;

    public function __construct(){
        $this->jugador = new Jugador();
        $this->cuprier = new Jugador();
        $this->mazo = new Mazo();
        $this->mazo->barajar();
    }

    public function robarCarta($puntero){
        $cartaObtenida = $this->mazo->getCartaEspecifica($puntero);
        return $cartaObtenida;
    }

    /**
     * Get the value of jugador
     */
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Set the value of jugador
     */
    public function setJugador(Jugador $jugador): self
    {
        $this->jugador = $jugador;

        return $this;
    }

    /**
     * Get the value of cuprier
     */
    public function getCuprier()
    {
        return $this->cuprier;
    }

    /**
     * Set the value of cuprier
     */
    public function setCuprier(Jugador $cuprier): self
    {
        $this->cuprier = $cuprier;

        return $this;
    }

    /**
     * Get the value of mazo
     */
    public function getMazo()
    {
        return $this->mazo;
    }

    /**
     * Set the value of mazo
     */
    public function setMazo(Mazo $mazo): self
    {
        $this->mazo = $mazo;

        return $this;
    }
}
