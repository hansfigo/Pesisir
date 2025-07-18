<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GolonganParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gol_parameter')->insert(
            [
                [
                    'nama' => "Fisika",
                ],
                [
                    'nama' => "Kimia",
                ],
                [
                    'nama' => "Logam Terlarut",
                ],
                [
                    'nama' => "Biologi",
                ],
                [
                    'nama' => "Radio Nuklida",
                ],
            ]
        );
    }
}
