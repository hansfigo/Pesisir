<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            LoginSeeder::class,
            GolonganParameterSeeder::class,
            ParameterSeeder::class,
            DataPesisirSeeder::class,
            DataParameterSeeder::class,
            DataUjiSeeder::class,
            LaporanSeeder::class,
            FungsiYSeeder::class
        ]);
    }
}
