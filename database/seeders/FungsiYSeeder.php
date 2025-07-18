<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FungsiYSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fungsi_y')->insert(
            [
                [
                    'id_parameter' => 6,
                    'fungsi_y' => 1,
                ],
                [
                    'id_parameter' => 6,
                    'fungsi_y' => 1,
                ],
            ]
        );
    }
}
