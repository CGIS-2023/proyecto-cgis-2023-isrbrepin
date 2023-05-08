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
                'name' => "Carlos Garrido",
                'email' => "medico1@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Marcos Garcia",
                'email' => "medico2@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Naomi Vargas",
                'email' => "medico3@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Mark Evans",
                'email' => "medico4@medico.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Pedro Muñoz",
                'email' => "celador1@celador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Pablo Fernandez",
                'email' => "celador2@celador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Matias Pratts",
                'email' => "celador3@celador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Iñaki Macias",
                'email' => "celador4@celador.com",
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
