<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carta;



class Mazo extends Model
{
    use HasFactory;

    /** @var Carta[] */
    public $cartas;


    public function __construct() {
        $this->cartas = [];
        $this->generateMazo();
    }


    public function generateMazo(){

        $palos = ['Corazones', 'Diamantes', 'Picas', 'Tréboles'];
        $valores = ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $carta = new Carta();
                $carta->setValor($valor);
                $carta->setPalo($palo);
                $this->cartas[] = $carta;

            }
        }

    }

    public function barajar(){
        shuffle($this->cartas);
    }

    public function getCartaEspecifica($index){
        return $this->cartas[$index] ?? null;   //Informarme de esto
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
