<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PersonaSeeder::class, EspecialidadSeeder::class, PatologiaSeeder::class, TipoCamillaSeeder::class, PacienteSeeder::class, UserSeeder::class, CeladorSeeder::class, CamillaSeeder::class, MedicoSeeder::class, SalaSeeder::class
        ]);
    }
}
