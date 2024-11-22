<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $nombre;

    /**
     * @var float
     */
    public $precio;

    /**
     * @var int
     */
    public $cantidad;
}
