<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActoresPeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actores_peliculas')->insert([
            ['pelicula_id' => 1, 'actor_id' => 1], // Nosferatu -> Terror
            ['pelicula_id' => 2, 'actor_id' => 2], // Dune -> Ciencia ficción
            ['pelicula_id' => 3, 'actor_id' => 2], // Dune 2 -> Ciencia ficción
            ['pelicula_id' => 4, 'actor_id' => 3], // Kraven the Hunter -> Acción
        ]);
    }
}
