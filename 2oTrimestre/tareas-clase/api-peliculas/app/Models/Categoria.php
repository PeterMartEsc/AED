<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property CategoriasPelicula[] $categoriasPeliculas
 */
class Categoria extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriasPeliculas()
    {
        return $this->belongsToMany(
            Pelicula::class, //objetos de la relación manytomany que queremos obtener
            'categorias_peliculas', //nombre de la tabla de enlace
            'categoria_id', // aquí el nombre de la foreign key en la tabla de enlace de nuestra entity id
            'pelicula_id' // aquí la foreign key de tabla de enlace, que apunta a la otra entidad
            );
    }
}
