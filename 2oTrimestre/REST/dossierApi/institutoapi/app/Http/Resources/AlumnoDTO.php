<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoDTO extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $diaEnSegundos = 60*60*24;

        return [

            'id_alumno' => $this->dni,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'fechanacimiento' => date("Y-m-d", $this->fechanacimiento/1000)
        ];
    }

}
