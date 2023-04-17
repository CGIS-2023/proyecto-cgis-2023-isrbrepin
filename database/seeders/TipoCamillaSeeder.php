<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCamillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_camillas')->insert([
            [
                'tipo' => "Articulada",
            ],
            [
                'tipo' => "Rígida",
            ],
            [
                'tipo' => "Tijera",
            ],
            [
                'tipo' => "Espinal",
            ],
            [
                'tipo' => "Libro",
            ],
        ]);
    }
}
