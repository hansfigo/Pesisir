<?php
namespace App\Services;

use App\Models\DataParameter;

class CWQICalculationService
{
    /**
     * @var \Illuminate\Support\Collection Kumpulan koefisien dan data parameter dari database.
     */
    private $coefficients;

    public function __construct()
    {
        $this->coefficients = DataParameter::whereHas('parameter', function ($query) {
            $query->whereIn('jenis', ['biota', 'wisata']);
        })->with('parameter')->get()->keyBy('id_parameter');
    }

    /**
     * Fungsi utama untuk menghitung CWQI (Canadian Water Quality Index).
     *
     * @param array $data      Data laporan dari database (berisi parameter dan nilai ambang batas).
     * @param array $sample    Array berisi indeks sampel (contoh: [1, 2, 3, 4, 5, 6]).
     * @param array $parameter Array dua dimensi berisi nilai sampel pengukuran (contoh: $parameter['biota'][ID_PARAM][1]).
     * @param string $jenis    Jenis peruntukan air ('biota' atau 'wisata').
     * @return array           Array hasil perhitungan CWQI, termasuk total WQIA, WQIAU, Wi, dan data parameter lengkap.
     */
    public function calculateCWQI($data, $sample, $parameter, $jenis = 'biota')
    {
        $result = [
            'WQIA'            => [],
            'WQIAU'           => [],
            'Wi_values'       => [],
            'parameters_data' => [],
            'totalVi'         => 0,
        ];

        $totalVi           = $this->calculateTotalVi($data, $jenis);
        $result['totalVi'] = $totalVi;

        foreach ($sample as $sample_index) {
            $result['WQIA'][$sample_index]  = 0;
            $result['WQIAU'][$sample_index] = 0;
        }

        $processedParameters = [];
        foreach ($data as $laporan) {
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (! in_array($laporan->param->id, $processedParameters)) {
                    $processedParameters[] = $laporan->param->id;
                }
            }
        }
        $jumlahParameter = count($processedParameters);

        $processedParameters = [];

        foreach ($data as $laporan) {
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (in_array($laporan->param->id, $processedParameters)) {
                    continue;
                }

                $processedParameters[] = $laporan->param->id;

                $SVi = ($laporan->get_data->nilai == '' ? 1 : $laporan->get_data->nilai);
                $k   = 1 / $totalVi;

                // Wi untuk tampilan di tabel (nilai aslinya)
                $Wi_display = $k / $SVi;
                // Wi untuk perhitungan (nilai yang dikali 100)
                $Wi_calculation = $Wi_display * 100;

                $parameterRow = [
                    'parameter'   => $laporan->param->parameter,
                    'id'          => $laporan->param->id,
                    'Wi'          => $Wi_display, // Gunakan Wi yang asli untuk tampilan
                    'sample_data' => [],
                ];

                foreach ($sample as $sample_index) {
                    $parameterValue = $parameter[$jenis][$laporan->id_parameter][$sample_index] ?? 0;

                    $qi = $this->calculateQi($laporan->param->id, $parameterValue);

                    // Gunakan Wi_calculation untuk menghitung Wi*qi
                    $wiqi = $qi * $Wi_calculation;

                    $parameterRow['sample_data'][$sample_index] = [
                        'qi'   => $qi,
                        'wiqi' => $wiqi,
                    ];

                    $result['WQIA'][$sample_index] += $wiqi;
                    $result['WQIAU'][$sample_index] += $qi;
                }

                $result['parameters_data'][] = $parameterRow;
            }
        }

        $finalWQIAU = [];
        foreach ($result['WQIAU'] as $sampleIndex => $totalQi) {
            $finalWQIAU[$sampleIndex] = $totalQi / $jumlahParameter;
        }
        $result['WQIAU'] = $finalWQIAU;

        return $result;
    }

    /**
     * Menghitung total nilai Vi dari semua parameter yang relevan.
     */
    private function calculateTotalVi($data, $jenis)
    {
        $totalVi      = 0;
        $processedIds = [];

        foreach ($data as $laporan) {
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (! in_array($laporan->param->id, $processedIds)) {
                    $SVi = ($laporan->get_data->nilai == '' ? 1 : $laporan->get_data->nilai);
                    $Vi  = round(1 / $SVi, 5);
                    $totalVi += $Vi;
                    $processedIds[] = $laporan->param->id;
                }
            }
        }

        return $totalVi;
    }

    /**
     * Menghitung nilai qi (indeks kualitas) menggunakan rumus eksponensial.
     */
    private function calculateQi($parameterId, $value)
    {
        if (isset($this->coefficients[$parameterId])) {
            $coeff = $this->coefficients[$parameterId];
            return $coeff->coefficient_a * exp($coeff->coefficient_b * $value);
        }

        return 80.0;
    }

    /**
     * Ini fungsi tambahan untuk mengambil nilai Wi saja,
     * mungkin berguna kalau kamu mau menampilkan tabel Wi secara terpisah.
     */
    public function getWiValues($data, $jenis = 'biota')
    {
        $totalVi      = $this->calculateTotalVi($data, $jenis);
        $wiValues     = [];
        $processedIds = [];

        foreach ($data as $laporan) {
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (! in_array($laporan->param->id, $processedIds)) {
                    $SVi = ($laporan->get_data->nilai == '' ? 1 : $laporan->get_data->nilai);
                    $Vi  = round(1 / $SVi, 4);
                    $k   = 1 / $totalVi;

                    $wiValues[] = [
                        'parameter' => $laporan->param->parameter,
                        'baku_mutu' => $laporan->get_data->baku_mutu,
                        'SVi'       => $SVi,
                        'Vi'        => $Vi,
                        'k'         => $k,
                        'Wi'        => $k / $SVi,
                    ];
                    $processedIds[] = $laporan->param->id;
                }
            }
        }

        return $wiValues;
    }

    /**
     * Menghitung statistik dasar (min, mean, max) dari array WQIA.
     */
    public function calculateStatistics($WQIA)
    {
        if (empty($WQIA)) {
            return ['min' => 0, 'mean' => 0, 'max' => 0];
        }

        return [
            'min'  => min($WQIA),
            'mean' => array_sum($WQIA) / count($WQIA),
            'max'  => max($WQIA),
            'status' => $this->getStatus(max($WQIA)),
        ];
    }

    public function getStatus($maxWQI)
    {
        // dd($maxWQI);

        if ($maxWQI < 25) {
            return 'Sangat Buruk';
        } else if ($maxWQI < 50) {
            return 'Buruk';
        } else if ($maxWQI < 70) {
            return 'Sedang';
        } else if ($maxWQI < 90) {
            return 'Bagus';
        } else {
            return 'Sangat Bagus';
        }
    }
}
