<?php

namespace App\Models;

class Figuras_Tableros
{
    public int $id;
    public int $tablero_id;
    public int $figura_id;
    public int $posicion;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of tablero_id
     */
    public function getTablero_id()
    {
        return $this->tablero_id;
    }

    /**
     * Set the value of tablero_id
     *
     * @return  self
     */
    public function setTablero_id($tablero_id)
    {
        $this->tablero_id = $tablero_id;

        return $this;
    }

    /**
     * Get the value of figura_id
     */
    public function getFigura_id()
    {
        return $this->figura_id;
    }

    /**
     * Set the value of figura_id
     *
     * @return  self
     */
    public function setFigura_id($figura_id)
    {
        $this->figura_id = $figura_id;

        return $this;
    }

    /**
     * Get the value of posicion
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set the value of posicion
     *
     * @return  self
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }
}


?>
