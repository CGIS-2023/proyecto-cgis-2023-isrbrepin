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
            TipoCamillaSeeder::class, CamillaSeeder::class, UserSeeder::class, CeladorSeeder::class, SalaSeeder::class
        ]);
    }
}
