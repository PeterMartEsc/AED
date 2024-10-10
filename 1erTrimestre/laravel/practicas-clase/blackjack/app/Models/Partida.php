<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mazo extends Model
{
    use HasFactory;

    /** @var Jugador[] */
    private $jugador;

    /** @var Jugador[]*/
    private $cuprier;

    /** @var Mazo[] */
    private $mazo;

    public function __construct(){
        $this->jugador = new Jugador();
        $this->cupier = new Jugador();
        $this->mazo = new Mazo();
    }

    public function robarCarta(){

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
    public function setJugador($jugador): self
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
    public function setCuprier($cuprier): self
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
    public function setMazo($mazo): self
    {
        $this->mazo = $mazo;

        return $this;
    }
}
