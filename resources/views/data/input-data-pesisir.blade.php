@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Input Data Pesisir dengan Validasi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-data-pesisir" action="{{ route('data-pesisir.store') }}" method="POST">
                        @csrf
                        
                        <!-- Info Validasi -->
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle"></i> Sistem Validasi Aktif</h6>
                            <small>
                                ✅ Parameter sesuai PP No. 22/2021 <br>
                                ✅ Validasi format angka & nilai logis <br>
                                ✅ Cek duplikasi data <br>
                                ✅ Konversi satuan otomatis <br>
                                ✅ Validasi tanggal sampling
                            </small>
                        </div>

                        <div class="row">
                            <!-- Parameter -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_parameter">Parameter <span class="text-danger">*</span></label>
                                    <select class="form-control" id="id_parameter" name="id_parameter" required>
                                        <option value="">-- Pilih Parameter --</option>
                                        <optgroup label="Biota Laut">
                                            <option value="2">Kekeruhan</option>
                                            <option value="4">Padatan Tersuspensi Total</option>
                                            <option value="11">BOD5</option>
                                            <option value="12">Amonia total (NH3-N)</option>
                                            <option value="13">Ortofosfat (PO4-P)</option>
                                            <option value="14">Nitrat (NO3-N)</option>
                                            <option value="15">Sianida (CN-)</option>
                                            <option value="16">Sulfida (H2S)</option>
                                            <option value="17">Hidrokarbon Petroleum Total (TPH)</option>
                                            <option value="18">Fenol total</option>
                                            <option value="19">PAH</option>
                                            <option value="20">PCB</option>
                                            <option value="21">Surfaktan (MBAS)</option>
                                            <option value="22">Minyak dan Lemak</option>
                                        </optgroup>
                                        <optgroup label="Wisata Bahari">
                                            <option value="51">BOD5</option>
                                            <option value="52">Amonia total (NH3-N)</option>
                                            <option value="53">Ortofosfat (PO4-P)</option>
                                            <option value="54">Nitrat (NO3-N)</option>
                                            <option value="63">Sulfida (H2S)</option>
                                            <option value="65">Fenol total</option>
                                            <option value="66">PAH</option>
                                            <option value="67">PCB</option>
                                            <option value="68">Surfaktan (MBAS)</option>
                                            <option value="69">Minyak dan Lemak</option>
                                        </optgroup>
                                    </select>
                                    <div id="parameter-error"></div>
                                    <div id="satuan-info"></div>
                                </div>
                            </div>

                            <!-- Hasil -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hasil">Nilai Hasil <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" id="hasil" name="hasil" 
                                           placeholder="Masukkan nilai hasil pengujian" required>
                                    <div id="hasil-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Lokasi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Sampling <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" 
                                           placeholder="Contoh: Pantai Kuta, Bali" required>
                                    <div id="lokasi-error"></div>
                                    <small class="text-muted">Nama akan diformat otomatis (Title Case)</small>
                                </div>
                            </div>

                            <!-- Tanggal Sampling -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_sampling">Tanggal Sampling <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal_sampling" name="tanggal_sampling" 
                                           max="{{ date('Y-m-d') }}" required>
                                    <div id="tanggal-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Uji Ke -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="uji_ke">Uji Ke</label>
                                    <select class="form-control" id="uji_ke" name="uji_ke">
                                        <option value="1">1 (Pertama)</option>
                                        <option value="2">2 (Duplikasi)</option>
                                        <option value="3">3 (Triplikasi)</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan (Opsional)</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" 
                                              placeholder="Catatan khusus, kondisi cuaca, dll"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Alert untuk duplikasi -->
                        <div id="duplicate-error"></div>

                        <!-- Tombol Submit -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Data
                                </button>
                                <button type="reset" class="btn btn-secondary ml-2">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Validasi JavaScript -->
<script src="{{ asset('js/validasi-data-pesisir.js') }}"></script>

<style>
/* Styling untuk error messages */
#parameter-error, #hasil-error, #lokasi-error, #tanggal-error, #duplicate-error {
    display: none;
    margin-top: 5px;
}

#satuan-info {
    margin-top: 5px;
}

.alert-info {
    border-left: 4px solid #17a2b8;
}

/* Highlight untuk field dengan error */
.form-control.is-invalid {
    border-color: #dc3545;
}

/* Highlight untuk field valid */
.form-control.is-valid {
    border-color: #28a745;
}
</style>

<script>
// Tambahan validasi khusus saat form submit
document.getElementById('form-data-pesisir').addEventListener('submit', function(e) {
    const submitButton = this.querySelector('button[type="submit"]');
    
    // Disable button sementara
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    
    // Re-enable jika ada error
    setTimeout(() => {
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fas fa-save"></i> Simpan Data';
    }, 3000);
});

// Auto-focus ke field berikutnya
document.getElementById('id_parameter').addEventListener('change', function() {
    if (this.value) {
        document.getElementById('hasil').focus();
    }
});

document.getElementById('hasil').addEventListener('blur', function() {
    if (this.value) {
        document.getElementById('lokasi').focus();
    }
});
</script>
@endsection
