<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('pacientes')->insert([
            [
                'nombre' => "Rocio",
                'apellido' => "Muñoz",
                'nuhsa' => "AN1234567890",
                'patologia_id' => 1,
            ],
            [
                'nombre' => "David",
                'apellido' => "Brea",
                'nuhsa' => "AN1234267891",
                'patologia_id' => 2,
            ],
            [
                'nombre' => "Joan",
                'apellido' => "Verdu",
                'nuhsa' => "AN1234563891",
                'patologia_id' => 3,
            ],
            [
                'nombre' => "Marc",
                'apellido' => "Pelaez",
                'nuhsa' => "AN1234567891",
                'patologia_id' => 4,
            ],
            [
                'nombre' => "Fran",
                'apellido' => "Ramirez",
                'nuhsa' => "AN1234567821",
                'patologia_id' => 4,
            ],
            [
                'nombre' => "Pablo",
                'apellido' => "Prieto",
                'nuhsa' => "AN1234567811",
                'patologia_id' => 4,
            ],
            [
                'nombre' => "Ramon",
                'apellido' => "Carranza",
                'nuhsa' => "AN1234567801",
                'patologia_id' => 4,
            ],
        ]);
    }
}
