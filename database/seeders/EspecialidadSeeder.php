<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidads')->insert([
            [
                'nombre' => "Cardiología",
            ],
            [
                'nombre' => "Neurología",
            ],
            [
                'nombre' => "Gastroenterología",
            ],
            [
                'nombre' => "Neumología",
            ],
            [
                'nombre' => "Traumatología",
            ],
        ]);
    }
}
