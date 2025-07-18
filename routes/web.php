<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiotaLautController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataLaporanController;
use App\Http\Controllers\DataPesisirController;
use App\Http\Controllers\DataHasilUjiController;
use App\Http\Controllers\WisataBahariController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataParameterController;
use App\Http\Controllers\KurvaParameterController;
use App\Models\DataUji;

Route::get('/', function () {
    return view('landing');
});

Route::get('peta', function () {
    $model = DataUji::all();
    $initialMarkers = [];
    foreach($model as $isi) {
        $initialMarkers[] = 
            [
                'position' => [
                    'lat' => $isi->pulau->latitude,
                    'lng' => $isi->pulau->longitude
                ],
                'draggable' => false,
                'title' => $isi->pulau->nama,
                'status_air' => statusAir($isi),
            ];
    };

    return view('peta',compact('initialMarkers'));
});

// LOGIN
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'login'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout-dashboard');

// REGISTER
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register/action', [RegisterController::class, 'create'])->name('register.post');

Auth::routes();

Route::get('status-indeks-air', [HomeController::class, 'status'])->name('status');

/*All Admin Routes List*/
Route::middleware(['user-access:admin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');

    // kurva
    Route::get('/kurva-parameter', [KurvaParameterController::class, 'index'])->name('index-kurva');

    // PARAMETER
    /////// biota laut
    Route::get('/parameter-biotalaut', [BiotaLautController::class, 'index'])->name('index-biota');
    Route::post('/parameter-biotalaut/create', [BiotaLautController::class, 'addNew'])->name('add-biota');
    Route::post('/parameter-biotalaut/update/{id}', [BiotaLautController::class, 'processUpdate'])->name('edit-biota');
    Route::get('/parameter-biotalaut/delete/{id}', [BiotaLautController::class, 'delete'])->name('delete-biota');
    /////// wisata bahari
    Route::get('/parameter-wisatabahari', [WisataBahariController::class, 'index'])->name('index-wisata');
    Route::post('/parameter-wisatabahari/create', [WisataBahariController::class, 'addNew'])->name('add-wisata');
    Route::post('/parameter-wisatabahari/update/{id}', [WisataBahariController::class, 'processUpdate'])->name('edit-wisata');
    Route::get('/parameter-wisatabahari/delete/{id}', [WisataBahariController::class, 'delete'])->name('delete-wisata');

    // data pesisir
    Route::get('/data-pesisir', [DataPesisirController::class, 'index'])->name('index-pesisir');
    Route::post('/data-pesisir/create', [DataPesisirController::class, 'addNew'])->name('add-pesisir');
    Route::post('/data-pesisir/update/{id}', [DataPesisirController::class, 'processUpdate'])->name('edit-pesisir');
    Route::get('/data-pesisir/delete/{id}', [DataPesisirController::class, 'delete'])->name('delete-pesisir');

    // DATA PARAMETER
    /////// biota laut
    Route::get('/data-parameter/biota-laut', [DataParameterController::class, 'index_biota'])->name('index-databiota');
    Route::post('/data-parameter/biota-laut/update/{id}', [DataParameterController::class, 'processUpdate_biota'])->name('edit-databiota');
    Route::get('/data-parameter/biota-laut/delete/{id}', [DataParameterController::class, 'delete_biota'])->name('delete-databiota');
    /////// wisata bahari
    Route::get('/data-parameter/wisata-bahari', [DataParameterController::class, 'index_wisata'])->name('index-datawisata');
    Route::post('/data-parameter/wisata-bahari/update/{id}', [DataParameterController::class, 'processUpdate_wisata'])->name('edit-datawisata');
    Route::get('/data-parameter/wisata-bahari/delete/{id}', [DataParameterController::class, 'delete_wisata'])->name('delete-datawisata');

    // data uji
    // Route::get('/data-uji', [DataHasilUjiController::class, 'index'])->name('index-uji');
    // Route::post('/data-uji/create', [DataHasilUjiController::class, 'addNew'])->name('add-uji');
    // Route::post('/data-uji/update/{id}', [DataHasilUjiController::class, 'processUpdate'])->name('edit-uji');
    // Route::post('/data-uji/add_parameter', [DataHasilUjiController::class, 'addNewParameter'])->name('add-ujiparam');
    // Route::post('/data-uji/update_parameter/{id}', [DataHasilUjiController::class, 'processUpdateParameter'])->name('edit-ujiparam');
    // Route::get('/data-uji/delete/{id}', [DataHasilUjiController::class, 'delete'])->name('delete-uji');
    // Route::post('/data-uji/add_hasil/{id}', [DataHasilUjiController::class, 'processAddHasil'])->name('add-hasil');

    // data laporan
    Route::get('/data-laporan', [DataLaporanController::class, 'index'])->name('index-laporan');
});

/*All User Routes List*/
Route::middleware(['user-access:user,admin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'userHome'])->name('user.home');

    // kurva
    Route::get('/kurva-parameter', [KurvaParameterController::class, 'index'])->name('index-kurva');

    // data uji
    Route::get('/data-uji', [DataHasilUjiController::class, 'index'])->name('index-uji');
    Route::post('/data-uji/create', [DataHasilUjiController::class, 'addNew'])->name('add-uji');
    Route::post('/data-uji/update/{id}', [DataHasilUjiController::class, 'processUpdate'])->name('edit-uji');
    Route::post('/data-uji/add_parameter', [DataHasilUjiController::class, 'addNewParameter'])->name('add-ujiparam');
    Route::post('/data-uji/update_parameter/{id}', [DataHasilUjiController::class, 'processUpdateParameter'])->name('edit-ujiparam');
    Route::get('/data-uji/hapus/{id?}', [DataHasilUjiController::class, 'processDelete'])->name('delete-uji');
    Route::post('/data-uji/add_hasil/{id}', [DataHasilUjiController::class, 'processAddHasil'])->name('add-hasil');

    // data laporan
    Route::get('/data-laporan', [DataLaporanController::class, 'index'])->name('index-laporan');
    Route::post('/data-laporan/create', [DataLaporanController::class, 'addNew'])->name('add-laporan');
    Route::post('/data-laporan/update/{id}', [DataLaporanController::class, 'processUpdate'])->name('edit-laporan');
    Route::get('/data-laporan/delete/{id}', [DataLaporanController::class, 'delete'])->name('delete-laporan');
    Route::get('/data-laporan/detail/{id}', [DataLaporanController::class, 'detail'])->name('detail-laporan');
});
