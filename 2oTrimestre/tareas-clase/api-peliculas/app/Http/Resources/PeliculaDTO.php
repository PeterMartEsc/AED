<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PeliculaDTO extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $actores = $this->actoresPelicula($this->id);
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'year' => $this->year,
            'descripcion' => $this->descripcion,
            'caratula' => $this->caratula,
            'trailer' => $this->trailer,

        ];
    }

    public function actoresPelicula(int $id){
        
    }
}
