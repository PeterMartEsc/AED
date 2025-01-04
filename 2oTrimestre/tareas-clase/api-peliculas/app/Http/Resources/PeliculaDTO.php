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
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'year' => $this->year,
            'actores' => $actores,
            'descripcion' => $this->descripcion,
            'caratula' => $this->caratula,
            'trailer' => $this->trailer,

        ];
    }

    public function actoresPelicula(int $id){
        $arrayActoresId = Actor::where("id", $id);
    }
}
