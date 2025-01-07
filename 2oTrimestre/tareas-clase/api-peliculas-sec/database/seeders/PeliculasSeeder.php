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
                'caratula' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Nosferatu_1922_poster.jpg/220px-Nosferatu_1922_poster.jpg',
            ],
            [
                'titulo' => 'Dune',
                'year' => 2021,
                'descripcion' => 'Adaptación cinematográfica de la famosa novela de ciencia ficción de Frank Herbert, dirigida por Denis Villeneuve.',
                'trailer' => 'https://www.youtube.com/watch?v=n9xhJrPXop4',
                'caratula' => 'https://upload.wikimedia.org/wikipedia/en/a/ab/Dune_2021_film_poster.jpg',
            ],
            [
                'titulo' => 'Dune 2',
                'year' => 2024,
                'descripcion' => 'Secuela de "Dune", que continúa la historia de Paul Atreides y su lucha por sobrevivir en el planeta Arrakis.',
                'trailer' => 'https://www.youtube.com/watch?v=O8KHN7yOP1E',
                'caratula' => 'https://upload.wikimedia.org/wikipedia/en/3/3f/Dune_Part_Two_2024_poster.jpg',
            ],
            [
                'titulo' => 'Kraven the Hunter',
                'year' => 2023,
                'descripcion' => 'Película basada en el personaje de Marvel, Kraven, quien busca demostrar que es el mejor cazador del mundo.',
                'trailer' => 'https://www.youtube.com/watch?v=TkBAQsoDd0g',
                'caratula' => 'https://upload.wikimedia.org/wikipedia/en/9/94/Kraven_the_Hunter_%282023%29_film_poster.jpg',
            ],
        ]);
    }
}
