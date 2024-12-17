<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $titulo
 * @property string $year
 * @property string $descripcion
 * @property string $trailer
 * @property string $caratula
 * @property string $created_at
 * @property string $updated_at
 * @property ActoresPelicula[] $actoresPeliculas
 * @property DirectoresPelicula[] $directoresPeliculas
 * @property CategoriasPelicula[] $categoriasPeliculas
 */
class Pelicula extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['titulo', 'year', 'descripcion', 'trailer', 'caratula', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actoresPeliculas()
    {
        return $this->belongsToMany(
            Actor::class, //objetos de la relación manytomany que queremos obtener
            'actores_peliculas', //nombre de la tabla de enlace
            'pelicula_id', // aquí el nombre de la foreign key en la tabla de enlace de nuestra entity id
            'actor_id' // aquí la foreign key de tabla de enlace, que apunta a la otra entidad
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directoresPeliculas()
    {
        return $this->belongsToMany(
            Director::class, //objetos de la relación manytomany que queremos obtener
            'directores_peliculas', //nombre de la tabla de enlace
            'pelicula_id', // aquí el nombre de la foreign key en la tabla de enlace de nuestra entity id
            'director_id' // aquí la foreign key de tabla de enlace, que apunta a la otra entidad
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriasPeliculas()
    {
        return $this->belongsToMany(
            Categoria::class, //objetos de la relación manytomany que queremos obtener
            'categorias_peliculas', //nombre de la tabla de enlace
            'pelicula_id', // aquí el nombre de la foreign key en la tabla de enlace de nuestra entity id
            'categoria_id' // aquí la foreign key de tabla de enlace, que apunta a la otra entidad
            );
    }
}
