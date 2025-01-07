<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ActoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actores')->insert([
            ['id' => 1, 'nombre' => 'Leonardo', 'apellidos' => 'DiCaprio'],
            ['id' => 2, 'nombre' => 'Kate', 'apellidos' => 'Winslet'],
            ['id' => 3, 'nombre' => 'Brad', 'apellidos' => 'Pitt'],
            ['id' => 4, 'nombre' => 'Margot', 'apellidos' => 'Robbie'],
            ['id' => 5, 'nombre' => 'Johnny', 'apellidos' => 'Depp'],
            ['id' => 6, 'nombre' => 'Helena', 'apellidos' => 'Bonham Carter'],
            ['id' => 7, 'nombre' => 'Robert', 'apellidos' => 'Downey Jr.'],
            ['id' => 8, 'nombre' => 'Chris', 'apellidos' => 'Evans'],
            ['id' => 9, 'nombre' => 'Scarlett', 'apellidos' => 'Johansson'],
            ['id' => 10, 'nombre' => 'Tom', 'apellidos' => 'Hanks'],
            ['id' => 11, 'nombre' => 'Robin', 'apellidos' => 'Wright'],
            ['id' => 12, 'nombre' => 'Natalie', 'apellidos' => 'Portman'],
            ['id' => 13, 'nombre' => 'Mila', 'apellidos' => 'Kunis'],
            ['id' => 14, 'nombre' => 'Christian', 'apellidos' => 'Bale'],
            ['id' => 15, 'nombre' => 'Heath', 'apellidos' => 'Ledger'],
            ['id' => 16, 'nombre' => 'Emma', 'apellidos' => 'Stone'],
            ['id' => 17, 'nombre' => 'Ryan', 'apellidos' => 'Gosling'],
            ['id' => 18, 'nombre' => 'Anne', 'apellidos' => 'Hathaway'],
            ['id' => 19, 'nombre' => 'Hugh', 'apellidos' => 'Jackman'],
            ['id' => 20, 'nombre' => 'Daniel', 'apellidos' => 'Radcliffe'],
            ['id' => 21, 'nombre' => 'Rupert', 'apellidos' => 'Grint'],
            ['id' => 22, 'nombre' => 'Emma', 'apellidos' => 'Watson'],
            ['id' => 23, 'nombre' => 'Jennifer', 'apellidos' => 'Lawrence'],
            ['id' => 24, 'nombre' => 'Josh', 'apellidos' => 'Hutcherson'],
            ['id' => 25, 'nombre' => 'Tom', 'apellidos' => 'Cruise'],
            ['id' => 26, 'nombre' => 'Emily', 'apellidos' => 'Blunt'],
            ['id' => 27, 'nombre' => 'Matt', 'apellidos' => 'Damon'],
            ['id' => 28, 'nombre' => 'Jessica', 'apellidos' => 'Chastain'],
            ['id' => 29, 'nombre' => 'Morgan', 'apellidos' => 'Freeman'],
            ['id' => 30, 'nombre' => 'Tim', 'apellidos' => 'Robbins'],
            ['id' => 31, 'nombre' => 'Michael', 'apellidos' => 'Caine'],
        ]);
    }
}
