<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            [
                'fecha_nacimiento' => "1994-01-01",
                'telefono' => "601234567",
                'fecha_contratacion' => "2021-01-01",
                'vacunado' => 1,
                'sueldo' => 1250.0,
                'user_id' => 2,
            ],
            [
                'fecha_nacimiento' => "1985-05-01",
                'telefono' => "653234567",
                'fecha_contratacion' => "2016-01-01",
                'vacunado' => 0,
                'sueldo' => 1400.0,
                'user_id' => 3,
            ],
        ]);  
    }
}
