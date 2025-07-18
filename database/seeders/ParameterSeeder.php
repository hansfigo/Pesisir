<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameter')->insert(
            [
                // BIOTA LAUT
                [
                    'id_gol' => 1,
                    'parameter' => "Kecerahan",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Kekeruhan",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Kebauan",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Padatan tersuspensi total",
                    'nama_lain' => "TSS",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Sampah",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Suhu",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Lapiran Minyak",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "pH",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Salinitas",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Oksigen terlarut",
                    'nama_lain' => "(DO, dissolved oxygen)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "BODs",
                    'nama_lain' => "(Kebutuhan Oksigen Biokimia, KOB)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Amonia total",
                    'nama_lain' => "(NH3-N)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Ortofosfat",
                    'nama_lain' => "(PO4-P)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Nitrat",
                    'nama_lain' => "(NO3-N)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Sianida",
                    'nama_lain' => "(CN)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Sulfida",
                    'nama_lain' => "(H2S)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Hidrokarbon Petroleum Total",
                    'nama_lain' => "(rPH)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Senyawa Fenol total",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "PAH",
                    'nama_lain' => "(Poliaromatik Hidrokarbon)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "PCB",
                    'nama_lain' => "(Poliklor Binefil)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Surfaktan (detergen) sebagai MBAS",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Minyak dan Lemak",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - BHC",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - DDT",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Endrin",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Toxaphan",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "TBT",
                    'nama_lain' => "(tri butil tin)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Raksa",
                    'nama_lain' => "(Hg)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Kromium heksavalen",
                    'nama_lain' => "(Cr(VI))",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Arsen",
                    'nama_lain' => "(As)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Kadmium",
                    'nama_lain' => "(Cd)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Tembaga",
                    'nama_lain' => "(Cu)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Timbal",
                    'nama_lain' => "(Pb)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Seng",
                    'nama_lain' => "(Zn)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Nikel",
                    'nama_lain' => "(Ni)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Coliform",
                    'nama_lain' => "(total)",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Patogen",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Fitoplankton",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],
                [
                    'id_gol' => 5,
                    'parameter' => "Radioaktifitas",
                    'nama_lain' => "",
                    'jenis' => "biota",
                ],

                // WISATA BAHARI
                [
                    'id_gol' => 1,
                    'parameter' => "Warna",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Kecerahan",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Kekeruhan",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Kebauan",
                    'nama_lain' => "TSS",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Padatan tersupensi total",
                    'nama_lain' => "(TSS)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Sampah",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Suhu",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 1,
                    'parameter' => "Lapisan Minyak",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "pH",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Salinitas",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Oksigen terlarut",
                    'nama_lain' => "(DO, dissolved oxygen)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "BODs",
                    'nama_lain' => "(Kebutuhan Oksigen Biokimia, KOB)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Amonia total",
                    'nama_lain' => "(NH3-N)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Ortofosfat",
                    'nama_lain' => "(PO4-P)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Nitrat",
                    'nama_lain' => "(NO3-N)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Sulfida",
                    'nama_lain' => "(H2S)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Senyawa Fenol total",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "PAH",
                    'nama_lain' => "(Poliaromatik hidrokarbon)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "PCB",
                    'nama_lain' => "(poliklor bifenil)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Surfaktan (deterjen) sebagai MBAS",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Minyak dan Lemak",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - BHC",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Aldrin / Dieldrin",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Chlordane",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - DDT",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Heptachlor",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Lindane",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Methoxy-chlor",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Endrin",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 2,
                    'parameter' => "Pestisida - Toxaphan",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Raksa",
                    'nama_lain' => "(Hg)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Kromium heksavalen",
                    'nama_lain' => "(Cr(VI))",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Arsen",
                    'nama_lain' => "(As)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Kadmium",
                    'nama_lain' => "(Cd)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Tembaga",
                    'nama_lain' => "(Cu)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Timbal",
                    'nama_lain' => "(Pb)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Seng",
                    'nama_lain' => "(Zn)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 3,
                    'parameter' => "Nikel",
                    'nama_lain' => "(Ni)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Fecal coliform",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Coliform",
                    'nama_lain' => "(total)",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Patogen",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 4,
                    'parameter' => "Fitoplankton",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
                [
                    'id_gol' => 5,
                    'parameter' => "Radioaktifitas",
                    'nama_lain' => "",
                    'jenis' => "wisata",
                ],
            ]
        );
    }
}
