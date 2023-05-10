<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            [
                'nombre' => "Juan",
                'apellido' => "Pérez",
                'fecha_nacimiento' => "1990-01-01",
            ],
            [
                'nombre' => "Andres",
                'apellido' => "Murillo",
                'fecha_nacimiento' => "1992-02-03",
            ],
        ]);
    }
}
