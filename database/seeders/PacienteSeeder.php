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
            ],
            [
                'nombre' => "David",
                'apellido' => "Brea",
                'nuhsa' => "AN1234567891",
            ],
            [
                'nombre' => "Joan",
                'apellido' => "Verdu",
                'nuhsa' => "AN1234567891",
            ],
            [
                'nombre' => "Marc Pelaez",
                'apellido' => "Brea",
                'nuhsa' => "AN1234567891",
            ],
        ]);
    }
}
