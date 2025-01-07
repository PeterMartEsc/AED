<?php

namespace App\Http\Resources;

use App\Models\Actor;
use App\Models\Pelicula;
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
        $pelicula = Pelicula::find($this->id);

        $actores = $pelicula->actoresPeliculas;
        $categorias = $pelicula->categoriasPeliculas;
        $directores = $pelicula->directoresPeliculas;

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'year' => $this->year,
            'direccion' => $directores,
            'actores' => $actores,
            'categorias' => $categorias,
            'descripcion' => $this->descripcion,
            'caratula' => $this->caratula,
            'trailer' => $this->trailer,
        ];
    }
}
