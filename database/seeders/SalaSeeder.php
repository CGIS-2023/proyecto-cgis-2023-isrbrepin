<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salas')->insert([
            [
                //'medico_id' => 1,
                //'paciente_id' => 1,
                'fecha_hora_inicio' => '2022-10-30 10:15:00',
                'planta' => "3",
                'numero_sala' => "135",
            ],
            [
                //'medico_id' => 1,
                //'paciente_id' => 2,
                'fecha_hora_inicio' => '2023-01-30 09:30:00',
                'planta' => "1",
                'numero_sala' => "45",
            ],
            [
                //'medico_id' => 2,
                //'paciente_id' => 2,
                'fecha_hora_inicio' => '2023-02-15 11:30:00',
                'planta' => "2",
                'numero_sala' => "99",
            ],
        ]);
    }
}
