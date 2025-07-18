<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_parameter')->insert(
            [
                // BIOTA LAUT
                [
                    'id_parameter' => 1,
                    'satuan' => "m",
                    'baku_mutu' => "6",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 2,
                    'satuan' => "NTU",
                    'baku_mutu' => "5",
                    'nilai' => "4.99",
                ],
                [
                    'id_parameter' => 3,
                    'satuan' => "",
                    'baku_mutu' => "Alami",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 4,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "20",
                    'nilai' => "8.61",
                ],
                [
                    'id_parameter' => 5,
                    'satuan' => "",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 6,
                    'satuan' => "oC",
                    'baku_mutu' => "28-30",
                    'nilai' => "29.00",
                ],
                [
                    'id_parameter' => 7,
                    'satuan' => "",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 8,
                    'satuan' => "",
                    'baku_mutu' => "7-8,5",
                    'nilai' => "7.75",
                ],
                [
                    'id_parameter' => 9,
                    'satuan' => "%",
                    'baku_mutu' => "33-34 ",
                    'nilai' => "33.50",
                ],
                [
                    'id_parameter' => 10,
                    'satuan' => "mg/L",
                    'baku_mutu' => "Nihil",
                    'nilai' => "5.00",
                ],
                [
                    'id_parameter' => 11,
                    'satuan' => "mg/L",
                    'baku_mutu' => "20",
                    'nilai' => "1.25",
                ],
                [
                    'id_parameter' => 12,
                    'satuan' => "mg/L",
                    'baku_mutu' => "300",
                    'nilai' => "18.75",
                ],
                [
                    'id_parameter' => 13,
                    'satuan' => "mg/L",
                    'baku_mutu' => "15",
                    'nilai' => "0.0009374375",
                ],
                [
                    'id_parameter' => 14,
                    'satuan' => "mg/L",
                    'baku_mutu' => "8",
                    'nilai' => "0.0005",
                ],
                [
                    'id_parameter' => 15,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,5",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 16,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,01",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 17,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,02",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 18,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,002",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 19,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,003",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 20,
                    'satuan' => "µg/L",
                    'baku_mutu' => "0,01",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 21,
                    'satuan' => "mg/L",
                    'baku_mutu' => "1",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 22,
                    'satuan' => "mg/L",
                    'baku_mutu' => "1",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 23,
                    'satuan' => "µg/L",
                    'baku_mutu' => "210",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 24,
                    'satuan' => "µg/L",
                    'baku_mutu' => "2",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 25,
                    'satuan' => "µg/L",
                    'baku_mutu' => "4",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 26,
                    'satuan' => "µg/L",
                    'baku_mutu' => "",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 27,
                    'satuan' => "µg/L",
                    'baku_mutu' => "0,01",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 28,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,001",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 29,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,005",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 30,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,012",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 31,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,001",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 32,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,008",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 33,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,008",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 34,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,05",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 35,
                    'satuan' => "mg/L ",
                    'baku_mutu' => "0,05",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 36,
                    'satuan' => "Jml/100mL",
                    'baku_mutu' => "1000",
                    'nilai' => "430.46",
                ],
                [
                    'id_parameter' => 37,
                    'satuan' => "sel/100mL",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 38,
                    'satuan' => "sel/mL",
                    'baku_mutu' => "1000",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 39,
                    'satuan' => "Bq/L",
                    'baku_mutu' => "4",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 40,
                    'satuan' => "Pt. Co",
                    'baku_mutu' => "30",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 41,
                    'satuan' => "m",
                    'baku_mutu' => "6",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 42,
                    'satuan' => "NTU",
                    'baku_mutu' => "5",
                    'nilai' => "4.99",
                ],
                [
                    'id_parameter' => 43,
                    'satuan' => "",
                    'baku_mutu' => "Berbau",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 44,
                    'satuan' => "mg/L",
                    'baku_mutu' => "20",
                    'nilai' => "8.61",
                ],
                [
                    'id_parameter' => 45,
                    'satuan' => "",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 46,
                    'satuan' => "oC",
                    'baku_mutu' => "28-30",
                    'nilai' => "29.00",
                ],
                [
                    'id_parameter' => 47,
                    'satuan' => "",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 48,
                    'satuan' => "",
                    'baku_mutu' => "7-8,5",
                    'nilai' => "7.75",
                ],
                [
                    'id_parameter' => 49,
                    'satuan' => "%",
                    'baku_mutu' => "33-34",
                    'nilai' => "33.50",
                ],
                [
                    'id_parameter' => 50,
                    'satuan' => "mg/L",
                    'baku_mutu' => "5",
                    'nilai' => "5.00",
                ],
                [
                    'id_parameter' => 51,
                    'satuan' => "mg/L",
                    'baku_mutu' => "20",
                    'nilai' => "0.62",
                ],
                [
                    'id_parameter' => 52,
                    'satuan' => "mg/L",
                    'baku_mutu' => "300",
                    'nilai' => "18.75",
                ],
                [
                    'id_parameter' => 53,
                    'satuan' => "mg/L",
                    'baku_mutu' => "15",
                    'nilai' => "0.0009374375",
                ],
                [
                    'id_parameter' => 54,
                    'satuan' => "mg/L",
                    'baku_mutu' => "8",
                    'nilai' => "0.0005",
                ],
                [
                    'id_parameter' => 55,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,02",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 56,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,001",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 57,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,003",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 58,
                    'satuan' => "µg/L",
                    'baku_mutu' => "0,005",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 59,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,001",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 60,
                    'satuan' => "mg/L",
                    'baku_mutu' => "1",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 61,
                    'satuan' => "µg/L",
                    'baku_mutu' => "210",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 62,
                    'satuan' => "µg/L",
                    'baku_mutu' => "17",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 63,
                    'satuan' => "µg/L",
                    'baku_mutu' => "3",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 64,
                    'satuan' => "µg/L",
                    'baku_mutu' => "2",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 65,
                    'satuan' => "µg/L",
                    'baku_mutu' => "18",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 66,
                    'satuan' => "µg/L",
                    'baku_mutu' => "56",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 67,
                    'satuan' => "µg/L",
                    'baku_mutu' => "35",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 68,
                    'satuan' => "µg/L",
                    'baku_mutu' => "1",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 69,
                    'satuan' => "µg/L",
                    'baku_mutu' => "5",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 70,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,002",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 71,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,002",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 72,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,025",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 73,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,002",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 74,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,05",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 75,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,005",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 76,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,095",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 77,
                    'satuan' => "mg/L",
                    'baku_mutu' => "0,075",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 78,
                    'satuan' => "Jml/100mL",
                    'baku_mutu' => "200",
                    'nilai' => "33.55",
                ],
                [
                    'id_parameter' => 79,
                    'satuan' => "Jml/10mL",
                    'baku_mutu' => "1000",
                    'nilai' => "430.46",
                ],
                [
                    'id_parameter' => 80,
                    'satuan' => "sel/100mL",
                    'baku_mutu' => "Nihil",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 81,
                    'satuan' => "sel/mL",
                    'baku_mutu' => "1000",
                    'nilai' => "",
                ],
                [
                    'id_parameter' => 82,
                    'satuan' => "Bq/L",
                    'baku_mutu' => "4",
                    'nilai' => "",
                ],

            ]
        );
    }
}
