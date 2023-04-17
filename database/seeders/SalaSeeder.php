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
                'celador_id' => 1,
                'fecha_hora_inicio' => '2022-10-30 10:15:00',
                'planta' => "3",
                'numero_sala' => "135",
                'numero_camillas' => 8,

            ],
            [
                //'medico_id' => 1,
                'celador_id' => 2,
                'fecha_hora_inicio' => '2023-01-30 09:30:00',
                'planta' => "1",
                'numero_sala' => "45",
                'numero_camillas' => 4,
            ],
            [
                //'medico_id' => 2,
                'celador_id' => 2,
                'fecha_hora_inicio' => '2023-02-15 11:30:00',
                'planta' => "2",
                'numero_sala' => "99",
                'numero_camillas' => 2,
            ],
        ]);

        DB::table('sala_camilla')->insert([
            [
                'sala_id' => 1,
                'camilla_id' => 1,
                'comentario' => '',
            ],
            [
                'sala_id' => 2,
                'camilla_id' => 2,
                'comentario' => '',
            ],
            [
                'sala_id' => 2,
                'camilla_id' => 1,
                'comentario' => '',
            ],
        ]);
    }
}
