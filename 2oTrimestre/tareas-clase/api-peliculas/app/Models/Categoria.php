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
        return $this->hasMany('App\Models\CategoriasPelicula');
    }
}
