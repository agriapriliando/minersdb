<div>
    <!-- Top Row Widgets-->
    <div class="row">
        {{-- toast --}}
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x">
            <div id="liveToast" class="toast mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto" id="pesan"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        {{-- toast --}}
        <!-- Tabel Perusahaan-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Example-->
                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Tambah Studi Kelayakan FS | {{ session('nama_pemegang_perizinan') }}</h6>
                            <a href="{{ route('stk.show', session('id_perusahaan')) }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="save({{ session('id_perusahaan') }})" x-data="{ editing: true }">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">No Persetujuan</label>
                                        <input type="text" class="form-control @error('stk_no_persetujuan') is-invalid @enderror" wire:model="stk_no_persetujuan">
                                        @error('stk_no_persetujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control @error('stk_tgl_persetujuan') is-invalid @enderror" wire:model="stk_tgl_persetujuan">
                                        @error('stk_tgl_persetujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Tereka M3</label>
                                        <input type="number" class="form-control @error('stk_sd_m3_tereka') is-invalid @enderror" wire:model="stk_sd_m3_tereka">
                                        @error('stk_sd_m3_tereka')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Tertunjuk M3</label>
                                        <input type="number" class="form-control @error('stk_sd_m3_tertunjuk') is-invalid @enderror" wire:model="stk_sd_m3_tertunjuk">
                                        @error('stk_sd_m3_tertunjuk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Terukur M3</label>
                                        <input type="number" class="form-control @error('stk_sd_m3_terukur') is-invalid @enderror" wire:model="stk_sd_m3_terukur">
                                        @error('stk_sd_m3_terukur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Tereka MT</label>
                                        <input type="number" class="form-control @error('stk_sd_mt_tereka') is-invalid @enderror" wire:model="stk_sd_mt_tereka">
                                        @error('stk_sd_mt_tereka')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Tertunjuk MT</label>
                                        <input type="number" class="form-control @error('stk_sd_mt_tertunjuk') is-invalid @enderror" wire:model="stk_sd_mt_tertunjuk">
                                        @error('stk_sd_mt_tertunjuk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sumber Daya Terukur MT</label>
                                        <input type="number" class="form-control @error('stk_sd_mt_terukur') is-invalid @enderror" wire:model="stk_sd_mt_terukur">
                                        @error('stk_sd_mt_terukur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Luas Sumber Daya</label>
                                        <input type="number" class="form-control @error('stk_luas_sumber_daya') is-invalid @enderror" wire:model="stk_luas_sumber_daya">
                                        @error('stk_luas_sumber_daya')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tenaga Ahli</label>
                                        <input type="text" class="form-control @error('stk_sd_tenaga_ahli') is-invalid @enderror" wire:model="stk_sd_tenaga_ahli">
                                        @error('stk_sd_tenaga_ahli')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cadangan Terkira M3</label>
                                        <input type="number" class="form-control @error('stk_cadang_m3_terkira') is-invalid @enderror" wire:model="stk_cadang_m3_terkira">
                                        @error('stk_cadang_m3_terkira')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cadangan Terbukti M3</label>
                                        <input type="number" class="form-control @error('stk_cadang_m3_terbukti') is-invalid @enderror" wire:model="stk_cadang_m3_terbukti">
                                        @error('stk_cadang_m3_terbukti')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cadangan Terkira MT</label>
                                        <input type="number" class="form-control @error('stk_cadang_mt_terkira') is-invalid @enderror" wire:model="stk_cadang_mt_terkira">
                                        @error('stk_cadang_mt_terkira')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cadangan Terbukti MT</label>
                                        <input type="number" class="form-control @error('stk_cadang_mt_terbukti') is-invalid @enderror" wire:model="stk_cadang_mt_terbukti">
                                        @error('stk_cadang_mt_terbukti')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Luas Cadangan</label>
                                        <input type="number" class="form-control @error('stk_luas_cadangan') is-invalid @enderror" wire:model="stk_luas_cadangan">
                                        @error('stk_luas_cadangan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Cadangan | Tenaga Ahli</label>
                                        <input type="text" class="form-control @error('stk_cadang_tenaga_ahli') is-invalid @enderror" wire:model="stk_cadang_tenaga_ahli">
                                        @error('stk_cadang_tenaga_ahli')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Target Produksi M3</label>
                                        <input type="number" class="form-control @error('stk_target_produksi_m3') is-invalid @enderror" wire:model="stk_target_produksi_m3">
                                        @error('stk_target_produksi_m3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Target Produksi MT</label>
                                        <input type="number" class="form-control @error('stk_target_produksi_mt') is-invalid @enderror" wire:model="stk_target_produksi_mt">
                                        @error('stk_target_produksi_mt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <button type="button" class="btn btn-secondary btn-sm" @click="$wire.resetForm()">Reset</button>
                            </form>
                        </div>
                    </div>
                    <!-- / Example-->
                </div>
            </div>
        </div>
        <!-- /Tabel Perusahaan-->

    </div>
    <!-- / Top Row Widgets-->
</div>
@script
    <script>
        $wire.on('save-success', (event) => {
            var element = document.getElementById('liveToast');
            console.log(event.message);
            const myToast = bootstrap.Toast.getOrCreateInstance(element);
            setTimeout(function() {
                myToast.show();
                document.getElementById('pesan').innerHTML = event.message;
                element.className += " text-bg-success";
                console.log(event.message);
            }, 10);
            setTimeout(function() {
                myToast.hide();
            }, 3000);
        });
    </script>
@endscript

@push('scriptsatas')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/theme.bundle.css" />
@endpush

@push('scriptsbawah')
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ asset('') }}assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('') }}assets/js/theme.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
