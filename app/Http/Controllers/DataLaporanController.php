<?php
namespace App\Http\Controllers;

use App\Models\DataUji;
use App\Models\SampelUji;
use App\Models\DataParameter;
use App\Services\CWQICalculationService;

class DataLaporanController extends Controller
{
    /**
     * @var CWQICalculationService
     */
    private $cwqiService;

    /**
     * Konstruktor controller.
     * Menggunakan Dependency Injection untuk mendapatkan instance dari CWQICalculationService.
     * Ini memastikan bahwa setiap kali DataLaporanController dibuat, service-nya sudah siap.
     *
     * @param CWQICalculationService $cwqiService Service untuk perhitungan CWQI.
     */
    public function __construct(CWQICalculationService $cwqiService)
    {
        $this->cwqiService = $cwqiService;
    }

    /**
     * Menampilkan daftar semua data uji.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua data dari tabel 'DataUji'.
        $data = DataUji::all();

        // Tampilkan view 'data.laporan.index' dengan data tersebut.
        return view('data.laporan.index', compact('data'));
    }

    /**
     * Menampilkan detail laporan perhitungan CWQI untuk ID pengujian tertentu.
     *
     * @param string $id ID pengujian yang dienkode base64.
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        // Decode ID dari base64 untuk mendapatkan ID yang sebenarnya.
        $id = base64_decode($id);

        // Ambil data sampel uji dari database berdasarkan ID pengujian.
        // Gunakan eager loading dengan `with()` untuk mengambil data
        // relasi 'get_data', 'param', dan 'get_year' sekaligus.
        // Ini lebih efisien daripada mengambilnya satu per satu.
        $data = SampelUji::where('id_uji', $id)->with('get_data')->with('param')->with('get_year')->get();

        // Ambil nomor-nomor sampel yang ada dan simpan dalam array.
        $sample = $data->pluck('uji_ke', 'uji_ke')->toArray();

        // Atur ulang data sampel ke dalam struktur array 3 dimensi
        // dengan format: [$jenis_air][$id_parameter][$uji_ke] = $hasil_uji.
        // Ini mempermudah service class untuk mengakses nilai-nilai sampel.
        $parameter = [];
        foreach ($data as $isi) {
            $parameter[$isi->param->jenis][$isi->id_parameter][$isi->uji_ke] = $isi->hasil;
        }

        // Panggil service CWQICalculationService untuk menghitung hasil CWQI
        // untuk kategori 'biota' dan 'wisata'.
        $biotaResults = $this->cwqiService->calculateCWQI($data, $sample, $parameter, 'biota');
        $wisataResults = $this->cwqiService->calculateCWQI($data, $sample, $parameter, 'wisata');

        // Panggil fungsi getWiValues dari service untuk mendapatkan nilai Wi yang asli
        // untuk ditampilkan di tabel (tanpa perkalian 100).
        $biotaWiValues = $this->cwqiService->getWiValues($data, 'biota');
        $wisataWiValues = $this->cwqiService->getWiValues($data, 'wisata');

        // Hitung statistik (min, mean, max) dari total WQIA.
        $biotaStats = $this->cwqiService->calculateStatistics($biotaResults['WQIA']);
        $wisataStats = $this->cwqiService->calculateStatistics($wisataResults['WQIA']);

        // Kirim semua data yang sudah diproses ke view 'data.laporan.detail_laporan'.
        return view('data.laporan.detail_laporan', compact(
            'data',
            'sample',
            'parameter',
            'biotaResults',
            'wisataResults',
            'biotaWiValues',
            'wisataWiValues',
            'biotaStats',
            'wisataStats'
        ));
    }
}