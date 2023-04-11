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
                'fecha_adquisicion' => '2022-10-30',
            ],
            [
                'precio' => 1000,
                'fecha_adquisicion' => '2019-10-30',
            ],
            [
                'precio' => 600,
                'fecha_adquisicion' => '2020-10-30',
            ],
            [
                'precio' => 400,
                'fecha_adquisicion' => '2018-10-30',
            ],
        ]);
    }
}
