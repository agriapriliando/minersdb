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
                            <h6 class="card-title m-0">Studi Kelayakan FS| {{ session('nama_pemegang_perizinan') }}</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" wire:navigate class="btn btn-primary btn-sm">Kembali</a>
                                <a href="{{ route('stk.add') }}" wire:navigate class="btn btn-primary btn-sm"><i class="ri-add-line"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($stk as $index => $item)
                                <form wire:submit.prevent="update({{ $item['id'] }})" x-data="{ editing: false, confirmDelete: false }" wire:key="stk-row-{{ $item['id'] }}">

                                    <div class="d-flex flex-nowrap overflow-auto gap-3">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                <span class="fw-bold">{{ $loop->iteration }}.</span> No Persetujuan
                                            </label>
                                            <input type="text" class="form-control @error('stk.' . $index . '.stk_no_persetujuan') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_no_persetujuan" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_no_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control @error('stk.' . $index . '.stk_tgl_persetujuan') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_tgl_persetujuan" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_tgl_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Tereka M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_m3_tereka') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_m3_tereka" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_m3_tereka')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Tertunjuk M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_m3_tertunjuk') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_m3_tertunjuk" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_m3_tertunjuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Terukur M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_m3_terukur') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_m3_terukur" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_m3_terukur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Tereka MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_mt_tereka') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_mt_tereka" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_mt_tereka')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Tertunjuk MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_mt_tertunjuk') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_mt_tertunjuk" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_mt_tertunjuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Sumber Daya Terukur MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_sd_mt_terukur') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_mt_terukur" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_mt_terukur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Luas Sumber Daya</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_luas_sumber_daya') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_luas_sumber_daya" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_luas_sumber_daya')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Tenaga Ahli</label>
                                            <input type="text" class="form-control @error('stk.' . $index . '.stk_sd_tenaga_ahli') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_sd_tenaga_ahli" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_sd_tenaga_ahli')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Cadangan Terkira M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_cadang_m3_terkira') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_cadang_m3_terkira" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_cadang_m3_terkira')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Cadangan Terbukti M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_cadang_m3_terbukti') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_cadang_m3_terbukti" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_cadang_m3_terbukti')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Cadangan Terkira MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_cadang_mt_terkira') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_cadang_mt_terkira" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_cadang_mt_terkira')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Cadangan Terbukti MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_cadang_mt_terbukti') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_cadang_mt_terbukti" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_cadang_mt_terbukti')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Luas Cadangan</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_luas_cadangan') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_luas_cadangan" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_luas_cadangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Cadangan | Tenaga Ahli</label>
                                            <input type="text" class="form-control @error('stk.' . $index . '.stk_cadang_tenaga_ahli') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_cadang_tenaga_ahli" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_cadang_tenaga_ahli')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Target Produksi M3</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_target_produksi_m3') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_target_produksi_m3" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_target_produksi_m3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Target Produksi MT</label>
                                            <input type="number" class="form-control @error('stk.' . $index . '.stk_target_produksi_mt') is-invalid @enderror"
                                                wire:model="stk.{{ $index }}.stk_target_produksi_mt" :disabled="!editing">
                                            @error('stk.' . $index . '.stk_target_produksi_mt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center mt-2">
                                        {{-- Simpan --}}
                                        <button type="submit" class="btn btn-primary btn-sm" x-show="editing" @click="editing = false">
                                            Simpan
                                        </button>

                                        {{-- Edit / Batal (reset nilai dari DB via method batal) --}}
                                        <button type="button" class="btn btn-secondary btn-sm" @click="editing = !editing" wire:click="batal({{ $index }})">
                                            <i class="ri-edit-line"></i>
                                            <span x-text="editing ? 'Batal' : 'Edit'"></span>
                                        </button>

                                        {{-- Alert konfirmasi hapus --}}
                                        <div x-cloak x-show="confirmDelete" x-transition @click.outside="confirmDelete = false">
                                            <span class="me-2">Yakin ingin menghapus data ini?</span>
                                            <button type="button" class="btn btn-danger btn-sm" @click="confirmDelete = false" wire:click="delete({{ $item['id'] }})">
                                                Ya
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-sm" @click="confirmDelete = false">
                                                Batal
                                            </button>
                                        </div>

                                        {{-- Hapus --}}
                                        <button type="button" class="btn btn-danger btn-sm text-white" @click.stop="confirmDelete = true">
                                            <i class="ri-delete-bin-line"></i> Hapus
                                        </button>

                                    </div>

                                    <hr class="my-3">
                                </form>
                            @endforeach
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
        $wire.on('update-success', (event) => {
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
        $wire.on('delete-success', (event) => {
            var element = document.getElementById('liveToast');
            console.log(event.message);
            const myToast = bootstrap.Toast.getOrCreateInstance(element);
            setTimeout(function() {
                myToast.show();
                document.getElementById('pesan').innerHTML = event.message;
                element.className += " text-bg-warning";
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
