<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directores')->insert([
            ['id' => 1, 'nombre' => 'Dan', 'apellidos' => 'Kwan'],
            ['id' => 2, 'nombre' => 'Sarah', 'apellidos' => 'Polley'],
            ['id' => 3, 'nombre' => 'Ruben', 'apellidos' => 'Östlund'],
            ['id' => 4, 'nombre' => 'Joseph', 'apellidos' => 'Kosinski'],
            ['id' => 5, 'nombre' => 'Todd', 'apellidos' => 'Field'],
            ['id' => 6, 'nombre' => 'Steven', 'apellidos' => 'Spielberg'],
            ['id' => 7, 'nombre' => 'Baz', 'apellidos' => 'Luhrmann'],
            ['id' => 8, 'nombre' => 'Martin', 'apellidos' => 'McDonagh'],
            ['id' => 9, 'nombre' => 'James', 'apellidos' => 'Cameron'],
            ['id' => 10, 'nombre' => 'Edward', 'apellidos' => 'Berger'],
            ['id' => 11, 'nombre' => 'Reinaldo', 'apellidos' => 'Marcus Green'],
            ['id' => 12, 'nombre' => 'Paul', 'apellidos' => 'Thomas Anderson'],
            ['id' => 13, 'nombre' => 'Guillermo', 'apellidos' => 'del Toro'],
            ['id' => 14, 'nombre' => 'Kenneth', 'apellidos' => 'Branagh'],
            ['id' => 15, 'nombre' => 'Guy', 'apellidos' => 'Ritchie'],
            ['id' => 16, 'nombre' => 'Jane', 'apellidos' => 'Campion'],
            ['id' => 17, 'nombre' => 'Adam', 'apellidos' => 'McKay'],
            ['id' => 18, 'nombre' => 'Ryûsuke', 'apellidos' => 'Hamaguchi'],
            ['id' => 19, 'nombre' => 'Denis', 'apellidos' => 'Villeneuve'],
            ['id' => 20, 'nombre' => 'Francis Ford', 'apellidos' => 'Coppola'],
            ['id' => 21, 'nombre' => 'Ridley', 'apellidos' => 'Scott'],
            ['id' => 22, 'nombre' => 'Antoine', 'apellidos' => 'Fuqua'],
            ['id' => 23, 'nombre' => 'Oz', 'apellidos' => 'Perkins'],
            ['id' => 24, 'nombre' => 'Daniel', 'apellidos' => 'Scheinert'],
        ]);
    }
}
