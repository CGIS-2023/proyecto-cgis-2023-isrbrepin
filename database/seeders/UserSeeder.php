<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Administrador",
                'email' => "administrador@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Carlos",
                'email' => "medico1@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Marcos",
                'email' => "medico2@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Pedro",
                'email' => "celador1@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Pablo",
                'email' => "celador2@paciente.com",
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
