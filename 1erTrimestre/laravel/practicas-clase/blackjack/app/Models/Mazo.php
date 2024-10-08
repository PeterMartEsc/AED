<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mazo extends Model
{
    use HasFactory;

    /** @var Carta[] */
    private $cartas;


    public function __construct(){
        $this->generateMazo();
    }


    public function generateMazo(){

        $palos = ['Corazones', 'Diamantes', 'Picas', 'Tréboles'];
        $valores = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $this->cartas[] = new Carta($valor, $palo);
            }
        }

    }

    public function barajar(){
        shuffle($this->cartas);
    }


    /**
     * Get the value of cartas
     */
    public function getCartas()
    {
        return $this->cartas;
    }

    /**
     * Set the value of cartas
     */
    public function setCartas($cartas): self
    {
        $this->cartas = $cartas;

        return $this;
    }
}
