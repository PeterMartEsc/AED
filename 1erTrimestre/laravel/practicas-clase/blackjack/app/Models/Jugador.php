<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mazo extends Model
{
    use HasFactory;

    /** @var String */
    private $name;

    /** @var Mazo[]*/
    private $mano;



    public function __construct(){
        $this->name = '';
        $this->mano = new Mazo();
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
        return $this->mano;
    }

    /**
     * Set the value of mano
     */
    public function setMano($mano): self
    {
        $this->mano = $mano;

        return $this;
    }
}
