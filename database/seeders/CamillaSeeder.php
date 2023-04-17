<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camillas')->insert([
            [
                'precio' => 200,
                'fecha_adquisicion' => '2021-01-01',
                'tipo_camilla_id' => 4,
                //paciente_id...
            ],
            [
                'precio' => 1000,
                'fecha_adquisicion' => '2019-01-01',
                'tipo_camilla_id' => 3,
            ],
            [
                'precio' => 600,
                'fecha_adquisicion' => '2020-01-01',
                'tipo_camilla_id' => 2,
            ],
            [
                'precio' => 400,
                'fecha_adquisicion' => '2022-01-01',
                'tipo_camilla_id' => 1,
            ],
        ]);
    }
}
