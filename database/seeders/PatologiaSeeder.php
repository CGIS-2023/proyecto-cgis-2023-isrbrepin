<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patologias')->insert([
            [
                'nombre' => "Cardiológica",
            ],
            [
                'nombre' => "Neurológica",
            ],
            [
                'nombre' => "Gastrointestinal",
            ],
            [
                'nombre' => "Respiratoria",
            ],
            [
                'nombre' => "Traumatológica",
            ],
        ]);
    }
}
