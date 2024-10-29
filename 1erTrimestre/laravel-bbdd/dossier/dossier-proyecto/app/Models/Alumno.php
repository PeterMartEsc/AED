<?php

class Alumno {

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $apellidos;

    /**
     * @var int
     */
    public $edad;




    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     */
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     */
    public function setEdad($edad): self
    {
        $this->edad = $edad;

        return $this;
    }
}


?>
