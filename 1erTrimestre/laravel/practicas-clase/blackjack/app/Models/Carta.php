<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carta extends Model
{
    use HasFactory;

    /** @var string */
    public $valor;

    /** @var string */
    public $palo;

    public function __construct($valor, $palo){
        $this->valor = $valor;
        $this->palo = $palo;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     */
    public function setValor($valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of palo
     */
    public function getPalo()
    {
        return $this->palo;
    }

    /**
     * Set the value of palo
     */
    public function setPalo($palo): self
    {
        $this->palo = $palo;

        return $this;
    }
}
