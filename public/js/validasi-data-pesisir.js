/**
 * Validasi Real-time untuk Input Data Pesisir
 * Sesuai dengan PP No. 22 Tahun 2021
 */

class ValidasiDataPesisir {
    constructor() {
        this.validParameters = {
            // Biota Laut
            2: { nama: 'Kekeruhan', satuan: 'NTU', min: 0, max: 100, jenis: 'biota' },
            4: { nama: 'Padatan Tersuspensi Total', satuan: 'mg/L', min: 0, max: 1000, jenis: 'biota' },
            11: { nama: 'BOD5', satuan: 'mg/L', min: 0, max: 100, jenis: 'biota' },
            12: { nama: 'Amonia total (NH3-N)', satuan: 'mg/L', min: 0, max: 10, jenis: 'biota' },
            13: { nama: 'Ortofosfat (PO4-P)', satuan: 'μg/L', min: 0, max: 1000, jenis: 'biota' },
            14: { nama: 'Nitrat (NO3-N)', satuan: 'μg/L', min: 0, max: 1000, jenis: 'biota' },
            15: { nama: 'Sianida (CN-)', satuan: 'mg/L', min: 0, max: 1, jenis: 'biota' },
            16: { nama: 'Sulfida (H2S)', satuan: 'mg/L', min: 0, max: 1, jenis: 'biota' },
            17: { nama: 'Hidrokarbon Petroleum Total (TPH)', satuan: 'mg/L', min: 0, max: 10, jenis: 'biota' },
            18: { nama: 'Fenol total', satuan: 'mg/L', min: 0, max: 1, jenis: 'biota' },
            19: { nama: 'PAH', satuan: 'mg/L', min: 0, max: 1, jenis: 'biota' },
            20: { nama: 'PCB', satuan: 'mg/L', min: 0, max: 1, jenis: 'biota' },
            21: { nama: 'Surfaktan (MBAS)', satuan: 'mg/L', min: 0, max: 10, jenis: 'biota' },
            22: { nama: 'Minyak dan Lemak', satuan: 'mg/L', min: 0, max: 10, jenis: 'biota' },
            
            // Wisata Bahari
            51: { nama: 'BOD5', satuan: 'mg/L', min: 0, max: 100, jenis: 'wisata' },
            52: { nama: 'Amonia total (NH3-N)', satuan: 'mg/L', min: 0, max: 10, jenis: 'wisata' },
            53: { nama: 'Ortofosfat (PO4-P)', satuan: 'μg/L', min: 0, max: 1000, jenis: 'wisata' },
            54: { nama: 'Nitrat (NO3-N)', satuan: 'μg/L', min: 0, max: 1000, jenis: 'wisata' },
            63: { nama: 'Sulfida (H2S)', satuan: 'mg/L', min: 0, max: 1, jenis: 'wisata' },
            65: { nama: 'Fenol total', satuan: 'mg/L', min: 0, max: 1, jenis: 'wisata' },
            66: { nama: 'PAH', satuan: 'mg/L', min: 0, max: 1, jenis: 'wisata' },
            67: { nama: 'PCB', satuan: 'mg/L', min: 0, max: 1, jenis: 'wisata' },
            68: { nama: 'Surfaktan (MBAS)', satuan: 'mg/L', min: 0, max: 10, jenis: 'wisata' },
            69: { nama: 'Minyak dan Lemak', satuan: 'mg/L', min: 0, max: 10, jenis: 'wisata' }
        };
        
        this.initializeValidation();
    }

    initializeValidation() {
        // Validasi saat parameter dipilih
        const parameterSelect = document.getElementById('id_parameter');
        if (parameterSelect) {
            parameterSelect.addEventListener('change', (e) => {
                this.updateSatuanInfo(e.target.value);
                this.validateParameter(e.target.value);
            });
        }

        // Validasi saat nilai diinput
        const hasilInput = document.getElementById('hasil');
        if (hasilInput) {
            hasilInput.addEventListener('input', (e) => {
                const parameterId = document.getElementById('id_parameter')?.value;
                this.validateValue(parameterId, e.target.value);
            });
            
            hasilInput.addEventListener('blur', (e) => {
                const parameterId = document.getElementById('id_parameter')?.value;
                this.validateValue(parameterId, e.target.value);
            });
        }

        // Validasi tanggal sampling
        const tanggalInput = document.getElementById('tanggal_sampling');
        if (tanggalInput) {
            tanggalInput.addEventListener('change', (e) => {
                this.validateTanggal(e.target.value);
            });
        }

        // Validasi lokasi
        const lokasiInput = document.getElementById('lokasi');
        if (lokasiInput) {
            lokasiInput.addEventListener('blur', (e) => {
                this.sanitizeLocation(e.target);
                this.checkDuplicateLocation();
            });
        }
    }

    updateSatuanInfo(parameterId) {
        const satuanInfo = document.getElementById('satuan-info');
        const param = this.validParameters[parameterId];
        
        if (param && satuanInfo) {
            satuanInfo.innerHTML = `
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> 
                    Satuan: <strong>${param.satuan}</strong> | 
                    Range: <strong>${param.min} - ${param.max}</strong>
                </small>
            `;
        }
    }

    validateParameter(parameterId) {
        const errorDiv = document.getElementById('parameter-error');
        
        if (!this.validParameters[parameterId]) {
            this.showError(errorDiv, 'Parameter tidak valid menurut PP No. 22/2021');
            return false;
        }
        
        this.clearError(errorDiv);
        return true;
    }

    validateValue(parameterId, value) {
        const errorDiv = document.getElementById('hasil-error');
        const numValue = parseFloat(value);
        
        // Cek apakah numerik
        if (isNaN(numValue)) {
            this.showError(errorDiv, 'Nilai harus berupa angka');
            return false;
        }
        
        // Cek nilai negatif
        if (numValue < 0) {
            this.showError(errorDiv, 'Nilai tidak boleh negatif');
            return false;
        }
        
        const param = this.validParameters[parameterId];
        if (!param) {
            this.clearError(errorDiv);
            return true;
        }
        
        // Cek range
        if (numValue < param.min) {
            this.showError(errorDiv, `Nilai ${param.nama} tidak boleh kurang dari ${param.min} ${param.satuan}`);
            return false;
        }
        
        if (numValue > param.max) {
            this.showError(errorDiv, `Nilai ${param.nama} tidak boleh lebih dari ${param.max} ${param.satuan} (tidak masuk akal)`);
            return false;
        }
        
        // Peringatan jika nilai mencurigakan
        if (numValue > (param.max * 0.8)) {
            this.showWarning(errorDiv, `Nilai ${param.nama} cukup tinggi (${numValue} ${param.satuan}). Pastikan data benar.`);
        } else {
            this.clearError(errorDiv);
        }
        
        return true;
    }

    validateTanggal(tanggal) {
        const errorDiv = document.getElementById('tanggal-error');
        const inputDate = new Date(tanggal);
        const today = new Date();
        
        if (inputDate > today) {
            this.showError(errorDiv, 'Tanggal sampling tidak boleh di masa depan');
            return false;
        }
        
        // Peringatan jika data terlalu lama (lebih dari 2 tahun)
        const twoYearsAgo = new Date();
        twoYearsAgo.setFullYear(twoYearsAgo.getFullYear() - 2);
        
        if (inputDate < twoYearsAgo) {
            this.showWarning(errorDiv, 'Data sampling cukup lama (lebih dari 2 tahun). Pastikan masih relevan.');
        } else {
            this.clearError(errorDiv);
        }
        
        return true;
    }

    sanitizeLocation(input) {
        // Bersihkan dan format nama lokasi
        let value = input.value.trim();
        value = value.replace(/\s+/g, ' '); // Hapus multiple spaces
        value = value.split(' ').map(word => 
            word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
        ).join(' ');
        
        input.value = value;
    }

    async checkDuplicateLocation() {
        const lokasi = document.getElementById('lokasi')?.value;
        const tanggal = document.getElementById('tanggal_sampling')?.value;
        const parameterId = document.getElementById('id_parameter')?.value;
        const ujiKe = document.getElementById('uji_ke')?.value || 1;
        
        if (!lokasi || !tanggal || !parameterId) return;
        
        try {
            const response = await fetch('/api/check-duplicate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    lokasi: lokasi,
                    tanggal_sampling: tanggal,
                    id_parameter: parameterId,
                    uji_ke: ujiKe
                })
            });
            
            const result = await response.json();
            const errorDiv = document.getElementById('duplicate-error');
            
            if (result.duplicate) {
                this.showError(errorDiv, 'Data dengan lokasi, tanggal, parameter, dan uji ke yang sama sudah ada');
            } else {
                this.clearError(errorDiv);
            }
        } catch (error) {
            console.error('Error checking duplicate:', error);
        }
    }

    validateForm() {
        const parameterId = document.getElementById('id_parameter')?.value;
        const hasil = document.getElementById('hasil')?.value;
        const tanggal = document.getElementById('tanggal_sampling')?.value;
        const lokasi = document.getElementById('lokasi')?.value;
        
        let isValid = true;
        
        isValid &= this.validateParameter(parameterId);
        isValid &= this.validateValue(parameterId, hasil);
        isValid &= this.validateTanggal(tanggal);
        
        if (!lokasi?.trim()) {
            const errorDiv = document.getElementById('lokasi-error');
            this.showError(errorDiv, 'Lokasi sampling harus diisi');
            isValid = false;
        }
        
        return isValid;
    }

    showError(errorDiv, message) {
        if (errorDiv) {
            errorDiv.innerHTML = `<small class="text-danger"><i class="fas fa-exclamation-triangle"></i> ${message}</small>`;
            errorDiv.style.display = 'block';
        }
    }

    showWarning(errorDiv, message) {
        if (errorDiv) {
            errorDiv.innerHTML = `<small class="text-warning"><i class="fas fa-exclamation-triangle"></i> ${message}</small>`;
            errorDiv.style.display = 'block';
        }
    }

    clearError(errorDiv) {
        if (errorDiv) {
            errorDiv.innerHTML = '';
            errorDiv.style.display = 'none';
        }
    }
}

// Initialize saat DOM ready
document.addEventListener('DOMContentLoaded', function() {
    window.validasiPesisir = new ValidasiDataPesisir();
    
    // Validasi sebelum submit form
    const form = document.getElementById('form-data-pesisir');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!window.validasiPesisir.validateForm()) {
                e.preventDefault();
                alert('Mohon perbaiki error validasi sebelum menyimpan data');
            }
        });
    }
});
