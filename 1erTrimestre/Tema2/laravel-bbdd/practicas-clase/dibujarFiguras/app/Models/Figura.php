<?php

namespace App\Models;

class Figura
{
    public int $id;
    public string $imagenBinario;
    public string $imagenBase64;
    public string $tipoimagen;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the binary value of imagen
     */
    public function getImagenBinario(): string
    {
        return $this->imagenBinario;
    }

    /**
     * Set the binary value of imagen
     *
     * @param string $imagenBinario
     * @return self
     */
    public function setImagenBinario(string $imagenBinario): self
    {
        $this->imagenBinario = $imagenBinario;
        return $this;
    }

    /**
     * Get the base64 encoded value of imagen
     */
    public function getImagenBase64(): string
    {
        return $this->imagenBase64;
    }

    /**
     * Set the base64 encoded value of imagen
     *
     * @param string $imagenBase64
     * @return self
     */
    public function setImagenBase64(string $imagenBase64): self
    {
        $this->imagenBase64 = $imagenBase64;
        return $this;
    }

    /**
     * Get the value of tipoimagen (MIME type)
     */
    public function getTipoimagen(): string
    {
        return $this->tipoimagen;
    }

    /**
     * Set the value of tipoimagen (MIME type)
     *
     * @param string $tipoimagen
     * @return self
     */
    public function setTipoimagen(string $tipoimagen): self
    {
        $this->tipoimagen = $tipoimagen;
        return $this;
    }
}


?>
