<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'id' => 1,
                'nombre' => 'Usuario Estandar',
                'email' => 'example@example.com',
                'password' => '$2y$12$nH7MVu.AU6MTEC33FZqjM.TFfrKCmhVOfEpdDW7NuPCR.waD8VopO',
                'rol' => 'usuario'
            ],
            [
                'id' => 2,
                'nombre' => 'Usuario Admin',
                'email' => 'exampleAdmin@example.com',
                'password' => '$2y$12$nH7MVu.AU6MTEC33FZqjM.TFfrKCmhVOfEpdDW7NuPCR.waD8VopO',
                'rol' => 'admin'
            ],
        ]);
    }
}
