<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'Ciencia Ficción'],
            ['id' => 2, 'nombre' => 'Drama'],
            ['id' => 3, 'nombre' => 'Comedia'],
            ['id' => 4, 'nombre' => 'Acción'],
            ['id' => 5, 'nombre' => 'Biografía'],
            ['id' => 6, 'nombre' => 'Musical'],
            ['id' => 7, 'nombre' => 'Aventura'],
            ['id' => 8, 'nombre' => 'Bélica'],
            ['id' => 9, 'nombre' => 'Romántica'],
            ['id' => 10, 'nombre' => 'Suspense'],
            ['id' => 11, 'nombre' => 'Western'],
            ['id' => 12, 'nombre' => 'Crimen'],
            ['id' => 13, 'nombre' => 'Thriller Psicológico'],
            ['id' => 14, 'nombre' => 'Fantasía'],
        ]);
    }
}
