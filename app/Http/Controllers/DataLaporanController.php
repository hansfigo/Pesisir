<?php
namespace App\Http\Controllers;

use App\Models\DataUji;
use App\Models\SampelUji;
use App\Models\DataParameter;
use App\Services\CWQICalculationService;

class DataLaporanController extends Controller
{
    private $cwqiService;
    
    public function __construct(CWQICalculationService $cwqiService)
    {
        $this->cwqiService = $cwqiService;
    }
    
    public function index()
    {
        $data = DataUji::All();
        return view('data.laporan.index', compact('data'));
    }

    public function detail($id)
    {
        $id = base64_decode($id);

        // Eager Load Relasi 'param'
        $data = SampelUji::where('id_uji', $id)->with('get_data')->with('param')->with('get_year')->get();

        $sample = $data->pluck('uji_ke', 'uji_ke')->toArray();
        $parameter = [];

        foreach ($data as $isi) {
            $parameter[$isi->param->jenis][$isi->id_parameter][$isi->uji_ke] = $isi->hasil;
        }

        // Calculate CWQI using service
        $biotaResults = $this->cwqiService->calculateCWQI($data, $sample, $parameter, 'biota');
        $wisataResults = $this->cwqiService->calculateCWQI($data, $sample, $parameter, 'wisata');
        
        // Get Wi values for display tables
        $biotaWiValues = $this->cwqiService->getWiValues($data, 'biota');
        $wisataWiValues = $this->cwqiService->getWiValues($data, 'wisata');
        
        // Calculate statistics
        $biotaStats = $this->cwqiService->calculateStatistics($biotaResults['WQIA']);
        $wisataStats = $this->cwqiService->calculateStatistics($wisataResults['WQIA']);

        return view('data.laporan.detail_laporan', compact(
            'data', 'sample', 'parameter',
            'biotaResults', 'wisataResults',
            'biotaWiValues', 'wisataWiValues',
            'biotaStats', 'wisataStats'
        ));
    }
}
