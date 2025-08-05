<?php
namespace App\Services;

use App\Models\DataParameter;

class CWQICalculationService
{
    /**
     * @var \Illuminate\Support\Collection Kumpulan koefisien dan data parameter dari database.
     */
    private $coefficients;

    /**
     * Konstruktor untuk service ini.
     * Begitu service ini dipanggil, dia langsung mengambil semua data parameter
     * yang dibutuhkan dari database. Ini supaya kita tidak perlu berulang kali
     * mengambil data yang sama. Data yang diambil sudah termasuk koefisien
     * dan informasi lainnya yang diperlukan untuk perhitungan.
     */
    public function __construct()
    {
        // Kita ambil data dari tabel 'data_parameter' yang berhubungan dengan 'biota' atau 'wisata'.
        // Lalu, kita simpan datanya dalam properti '$coefficients' agar bisa diakses
        // oleh semua fungsi di dalam kelas ini.
        $this->coefficients = DataParameter::whereHas('parameter', function ($query) {
            $query->whereIn('jenis', ['biota', 'wisata']);
        })->with('parameter')->get()->keyBy('id_parameter');
    }

    /**
     * Ini adalah fungsi utama untuk menghitung CWQI (Canadian Water Quality Index).
     * Fungsi ini bertugas mengolah semua data sampel yang diberikan
     * untuk menghasilkan nilai CWQI secara keseluruhan.
     *
     * @param array $data      Data mentah dari laporan pengujian (dari tabel 'sampel_uji').
     * @param array $sample    Daftar nomor-nomor sampel yang ada (misal: [1, 2, 3]).
     * @param array $parameter Data nilai hasil uji per parameter dan per sampel.
     * @param string $jenis    Jenis peruntukan air yang diuji ('biota' atau 'wisata').
     * @return array           Hasil perhitungan lengkap yang siap ditampilkan.
     */
    public function calculateCWQI($data, $sample, $parameter, $jenis = 'biota')
    {
        // Siapkan 'wadah' kosong untuk menampung semua hasil perhitungan.
        $result = [
            'WQIA'              => [], // Wadah untuk total WQIA per sampel.
            'WQIAU'             => [], // Wadah untuk total WQIAU per sampel.
            'Wi_values'         => [], // Wadah untuk nilai bobot (Wi).
            'parameters_data'   => [], // Wadah untuk menyimpan detail perhitungan per parameter.
            'totalVi'           => 0,  // Wadah untuk total Vi yang akan dihitung.
        ];

        // Langkah 1: Hitung total Vi, ini adalah nilai dasar untuk menentukan bobot.
        $totalVi = $this->calculateTotalVi($data, $jenis);
        $result['totalVi'] = $totalVi;

        // Siapkan 'wadah' untuk setiap sampel, inisialisasikan dengan nilai 0.
        // Tujuannya agar kita bisa langsung menjumlahkan hasilnya nanti.
        foreach ($sample as $sample_index) {
            $result['WQIA'][$sample_index]  = 0;
            $result['WQIAU'][$sample_index] = 0;
        }

        // Langkah 2: Hitung jumlah parameter yang diuji.
        // Ini penting karena nilai WQIAU perlu dibagi dengan jumlah parameter.
        $processedParameters = [];
        foreach ($data as $laporan) {
            // Kita hanya ambil parameter yang relevan untuk jenis air ini
            // dan hanya dari sampel pertama, karena bobotnya sama untuk semua sampel.
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (! in_array($laporan->param->id, $processedParameters)) {
                    $processedParameters[] = $laporan->param->id;
                }
            }
        }
        $jumlahParameter = count($processedParameters);

        // Langkah 3: Lakukan perhitungan utama untuk setiap parameter.
        $processedParameters = [];
        foreach ($data as $laporan) {
            // Lagi-lagi, kita hanya memproses parameter sekali saja.
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                if (in_array($laporan->param->id, $processedParameters)) {
                    continue;
                }

                $processedParameters[] = $laporan->param->id;

                // Ambil nilai ambang batas (SVi) dari data.
                $SVi = ($laporan->get_data->nilai == '' ? 1 : $laporan->get_data->nilai);
                // Hitung koefisien 'k'.
                $k   = 1 / $totalVi;

                // Hitung bobot (Wi) yang dibutuhkan.
                // Wi yang asli (tanpa perkalian) untuk ditampilkan.
                $Wi_display = $k / $SVi;
                // Wi yang dikali 100 untuk perhitungan CWQI. Ini sesuai dengan logika yang
                // ditemukan pada data referensi.
                $Wi_calculation = $Wi_display * 100;

                // Siapkan wadah untuk menyimpan data hasil perhitungan parameter ini.
                $parameterRow = [
                    'parameter'     => $laporan->param->parameter,
                    'id'            => $laporan->param->id,
                    'Wi'            => $Wi_display, // Wi yang kecil untuk tampilan.
                    'sample_data'   => [],
                ];

                // Lakukan perhitungan untuk setiap sampel yang ada.
                foreach ($sample as $sample_index) {
                    // Ambil nilai hasil uji dari sampel yang bersangkutan.
                    $parameterValue = $parameter[$jenis][$laporan->id_parameter][$sample_index] ?? 0;

                    // Hitung nilai 'qi' (indeks kualitas) dengan rumus eksponensial.
                    $qi = $this->calculateQi($laporan->param->id, $parameterValue);

                    // Hitung kontribusi parameter terhadap CWQI dengan mengalikan qi dengan Wi_calculation.
                    $wiqi = $qi * $Wi_calculation;

                    // Simpan hasil perhitungan ke dalam wadah.
                    $parameterRow['sample_data'][$sample_index] = [
                        'qi'   => $qi,
                        'wiqi' => $wiqi,
                    ];

                    // Tambahkan hasil ini ke total WQIA dan WQIAU.
                    $result['WQIA'][$sample_index]  += $wiqi;
                    $result['WQIAU'][$sample_index] += $qi;
                }

                // Masukkan data parameter ini ke dalam hasil akhir.
                $result['parameters_data'][] = $parameterRow;
            }
        }

        // Langkah 4: Sempurnakan perhitungan WQIAU.
        // Berdasarkan rumus yang ditemukan, total qi harus dibagi dengan jumlah parameter.
        $finalWQIAU = [];
        foreach ($result['WQIAU'] as $sampleIndex => $totalQi) {
            $finalWQIAU[$sampleIndex] = $totalQi / $jumlahParameter;
        }
        $result['WQIAU'] = $finalWQIAU;

        return $result;
    }

    /**
     * Fungsi ini menghitung total nilai Vi dari semua parameter yang relevan.
     * Vi adalah 1 / SVi (nilai ambang batas). Total ini dipakai untuk
     * menentukan koefisien 'k' yang menjadi dasar perhitungan bobot (Wi).
     *
     * @param array $data  Data laporan dari database.
     * @param string $jenis Jenis peruntukan air.
     * @return float       Total Vi.
     */
    private function calculateTotalVi($data, $jenis)
    {
        $totalVi = 0;
        $processedIds = [];

        foreach ($data as $laporan) {
            if ($laporan->param->jenis == $jenis && $laporan->uji_ke == 1) {
                // Pastikan setiap parameter hanya dihitung sekali.
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
     * Fungsi ini menghitung nilai 'qi' (indeks kualitas) dengan rumus eksponensial.
     * Rumus yang dipakai adalah y = a * e^(b*x).
     * Nilai 'a' dan 'b' diambil langsung dari database.
     *
     * @param int $parameterId ID parameter yang diuji.
     * @param float $value Nilai hasil uji (x).
     * @return float Nilai qi.
     */
    private function calculateQi($parameterId, $value)
    {
        // Cek apakah koefisien untuk parameter ini ada.
        if (isset($this->coefficients[$parameterId])) {
            $coeff = $this->coefficients[$parameterId];
            // Lakukan perhitungan dengan koefisien dari database.
            return $coeff->coefficient_a * exp($coeff->coefficient_b * $value);
        }

        // Jika tidak ada koefisien, kembalikan nilai default 80.0
        // (yaitu nilai dasar dari metode CWQI).
        return 80.0;
    }

    /**
     * Fungsi ini khusus untuk mengambil nilai bobot (Wi) yang asli,
     * yang mungkin kamu butuhkan untuk menampilkan tabel Wi secara terpisah
     * tanpa perkalian 100.
     *
     * @param array $data  Data laporan dari database.
     * @param string $jenis Jenis peruntukan air.
     * @return array       Array berisi data parameter dan Wi aslinya.
     */
    public function getWiValues($data, $jenis = 'biota')
    {
        $totalVi = $this->calculateTotalVi($data, $jenis);
        $wiValues = [];
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
     * Fungsi ini menghitung statistik dasar (nilai minimum, rata-rata, dan maksimum)
     * dari hasil total CWQI (WQIA).
     *
     * @param array $WQIA Array total WQIA per sampel.
     * @return array      Nilai statistik yang sudah dihitung.
     */
    public function calculateStatistics($WQIA)
    {
        // Jika tidak ada data WQIA, kembalikan nilai 0 untuk menghindari error.
        if (empty($WQIA)) {
            return ['min' => 0, 'mean' => 0, 'max' => 0, 'status' => 'Data Kosong'];
        }

        $min = min($WQIA);
        $max = max($WQIA);
        $mean = array_sum($WQIA) / count($WQIA);

        // Ambil status kualitas air berdasarkan nilai maksimum WQIA.
        return [
            'min'    => $min,
            'mean'   => $mean,
            'max'    => $max,
            'status' => $this->getStatus($max),
        ];
    }

    /**
     * Fungsi ini mengklasifikasikan nilai CWQI ke dalam status kualitas air yang lebih mudah
     * dipahami (misal: 'Sangat Buruk', 'Bagus'). Klasifikasi ini didasarkan pada
     * rentang nilai yang ditetapkan.
     *
     * @param float $maxWQI Nilai CWQI maksimum dari seluruh sampel.
     * @return string       Status kualitas air.
     */
    public function getStatus($maxWQI)
    {
        // Klasifikasi berdasarkan rentang nilai CWQI.
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