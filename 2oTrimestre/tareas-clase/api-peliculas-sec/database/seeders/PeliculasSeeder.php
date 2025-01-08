<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peliculas')->insert([
            [
                'titulo' => 'Nosferatu',
                'year' => 1922,
                'descripcion' => 'Una de las primeras películas de terror, dirigida por F.W. Murnau, basada libremente en la novela "Drácula" de Bram Stoker.',
                'trailer' => 'https://www.youtube.com/watch?v=3Lz0F9D3G0I',
                'caratula' => 'https://pics.filmaffinity.com/nosferatu-964410519-large.jpg',
            ],
            [
                'titulo' => 'Dune',
                'year' => 2021,
                'descripcion' => 'Adaptación cinematográfica de la famosa novela de ciencia ficción de Frank Herbert, dirigida por Denis Villeneuve.',
                'trailer' => 'https://www.youtube.com/watch?v=n9xhJrPXop4',
                'caratula' => 'https://pics.filmaffinity.com/dune-209834814-large.jpg',
            ],
            [
                'titulo' => 'Dune 2',
                'year' => 2024,
                'descripcion' => 'Secuela de "Dune", que continúa la historia de Paul Atreides y su lucha por sobrevivir en el planeta Arrakis.',
                'trailer' => 'https://www.youtube.com/watch?v=O8KHN7yOP1E',
                'caratula' => 'https://pics.filmaffinity.com/dune_part_two-802143593-large.jpg',
            ],
            [
                'titulo' => 'Kraven the Hunter',
                'year' => 2023,
                'descripcion' => 'Película basada en el personaje de Marvel, Kraven, quien busca demostrar que es el mejor cazador del mundo.',
                'trailer' => 'https://www.youtube.com/watch?v=TkBAQsoDd0g',
                'caratula' => 'https://pics.filmaffinity.com/kraven_the_hunter-206172064-large.jpg',
            ],
        ]);
    }
}
