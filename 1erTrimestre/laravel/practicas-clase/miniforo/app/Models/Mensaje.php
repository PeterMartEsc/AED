<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mensaje extends Model
{
    use HasFactory;

    /** @var int */
    public $id;

    /** @var string */
    public $titulo;

    /** @var string */
    public $mensaje;


    public function __construct(int $id, string $titulo, string $mensaje){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of mensaje
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set the value of mensaje
     */
    public function setMensaje($mensaje): self
    {
        $this->mensaje = $mensaje;

        return $this;
    }


    public function __toString(){
        return "Titulo: {$this->titulo} - Mensaje: {$this->mensaje}";
    }
}
