<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mazo;
use App\Models\Carta;



class Jugador extends Model
{
    use HasFactory;

    /** @var String */
    public $name;

    /** @var Carta[]*/
    public $mano;



    public function __construct(){
        $this->name = '';
        $this->mano = [];
    }


    public function addCarta(Carta $carta): self {
        $this->mano[] = $carta; // Añade la carta al array de mano
        return $this;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of mano
     */
    public function getMano()
    {
        $resultado = '';

        foreach ($this->mano as $carta){
            $resultado .= $carta->getValor() . " de " . $carta->getPalo() . ", ";
        }

        return $resultado;
    }

    public function getArrayMano(){
        return $this->mano;
    }

    public function getPuntuacion(){
        $puntuacion = 0;

        foreach ($this->mano as $carta){
            if($carta->getValor() == 'As'){
                $puntuacion += 11;
            } else if(is_numeric($carta->getValor())){
                $puntuacion += intval($carta->getValor());
            } else {
                $puntuacion += 10;
            }
        }

        return $puntuacion;
    }

    /**
     * Set the value of mano
     */
    public function setMano(Mazo $mano): self
    {
        $this->mano = $mano;

        return $this;
    }
}
