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
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" wire:navigate class="btn btn-primary btn-sm">Profil</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 3%">#</th>
                                        <th class="text-nowrap">No Persetujuan</th>
                                        <th class="text-nowrap">Tgl Persetujuan</th>
                                        <th class="text-nowrap">SD M³ Tereka</th>
                                        <th class="text-nowrap">SD M³ Tertunjuk</th>
                                        <th class="text-nowrap">SD M³ Terukur</th>
                                        <th class="text-nowrap">SD MT Tereka</th>
                                        <th class="text-nowrap">SD MT Tertunjuk</th>
                                        <th class="text-nowrap">SD MT Terukur</th>
                                        <th class="text-nowrap">Luas Sumber Daya</th>
                                        <th class="text-nowrap">SD Tenaga Ahli</th>
                                        <th class="text-nowrap">Cadang M³ Terkira</th>
                                        <th class="text-nowrap">Cadang M³ Terbukti</th>
                                        <th class="text-nowrap">Cadang MT Terkira</th>
                                        <th class="text-nowrap">Cadang MT Terbukti</th>
                                        <th class="text-nowrap">Luas Cadangan</th>
                                        <th class="text-nowrap">Cadang Tenaga Ahli</th>
                                        <th class="text-nowrap">Target Produksi M³</th>
                                        <th class="text-nowrap">Target Produksi MT</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stk as $id => $item)
                                        <tr wire:key="stk-row-{{ $id }}" x-data="{ confirmDelete: false }">
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- No Persetujuan --}}
                                            <td>
                                                <input type="text" class="form-control form-control-sm @error('stk.' . $id . '.stk_no_persetujuan') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_no_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_no_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tgl Persetujuan --}}
                                            <td>
                                                <input type="date" class="form-control form-control-sm @error('stk.' . $id . '.stk_tgl_persetujuan') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_tgl_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_tgl_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M3 Tereka --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_m3_tereka') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_m3_tereka" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_m3_tereka')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M3 Tertunjuk --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_m3_tertunjuk') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_m3_tertunjuk" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_m3_tertunjuk')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M3 Terukur --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_m3_terukur') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_m3_terukur" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_m3_terukur')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Tereka --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_mt_tereka') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_mt_tereka" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_mt_tereka')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Tertunjuk --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_mt_tertunjuk') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_mt_tertunjuk" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_mt_tertunjuk')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Terukur --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_mt_terukur') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_mt_terukur" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_mt_terukur')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Luas Sumber Daya --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_luas_sumber_daya') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_luas_sumber_daya" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_luas_sumber_daya')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD Tenaga Ahli --}}
                                            <td><input type="text" class="form-control form-control-sm @error('stk.' . $id . '.stk_sd_tenaga_ahli') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_sd_tenaga_ahli" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_sd_tenaga_ahli')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Cadang M3 Terkira --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_cadang_m3_terkira') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_cadang_m3_terkira" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_cadang_m3_terkira')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Cadang M3 Terbukti --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_cadang_m3_terbukti') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_cadang_m3_terbukti" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_cadang_m3_terbukti')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Cadang MT Terkira --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_cadang_mt_terkira') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_cadang_mt_terkira" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_cadang_mt_terkira')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Cadang MT Terbukti --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_cadang_mt_terbukti') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_cadang_mt_terbukti" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_cadang_mt_terbukti')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Luas Cadangan --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_luas_cadangan') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_luas_cadangan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_luas_cadangan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Cadang Tenaga Ahli --}}
                                            <td><input type="text" class="form-control form-control-sm @error('stk.' . $id . '.stk_cadang_tenaga_ahli') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_cadang_tenaga_ahli" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_cadang_tenaga_ahli')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Target Produksi M3 --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_target_produksi_m3') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_target_produksi_m3" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_target_produksi_m3')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Target Produksi MT --}}
                                            <td><input type="number" class="form-control form-control-sm @error('stk.' . $id . '.stk_target_produksi_mt') is-invalid @enderror"
                                                    wire:model="stk.{{ $id }}.stk_target_produksi_mt" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('stk.' . $id . '.stk_target_produksi_mt')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tombol Aksi --}}
                                            <td>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <button type="button" class="btn btn-primary btn-sm" wire:click="update({{ $id }})"
                                                        x-show="$wire.editingId === {{ $id }}">Simpan</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" @click="$wire.editingId = {{ $id }}"
                                                        x-show="$wire.editingId !== {{ $id }}"><i class="ri-edit-line"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-sm" wire:click="batal({{ $id }})"
                                                        x-show="$wire.editingId === {{ $id }}"><i class="ri-close-line"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm text-white" @click.stop="confirmDelete = true"
                                                        x-show="$wire.editingId !== {{ $id }}"><i class="ri-delete-bin-line"></i></button>
                                                </div>
                                                <div x-cloak x-show="confirmDelete" x-transition class="mt-2">
                                                    <span class="small d-block mb-1">Yakin hapus?</span>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-danger btn-sm" @click="confirmDelete = false" wire:click="delete({{ $id }})">Ya</button>
                                                        <button type="button" class="btn btn-secondary btn-sm" @click="confirmDelete = false">Batal</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- Form tambah data baru --}}
                                    <tr>
                                        <td>+</td>
                                        <td><input type="text" class="form-control form-control-sm @error('stk_no_persetujuan') is-invalid @enderror" wire:model="stk_no_persetujuan"
                                                placeholder="No Persetujuan">
                                            @error('stk_no_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="date" class="form-control form-control-sm @error('stk_tgl_persetujuan') is-invalid @enderror" wire:model="stk_tgl_persetujuan">
                                            @error('stk_tgl_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_m3_tereka') is-invalid @enderror" wire:model="stk_sd_m3_tereka"
                                                placeholder="M3 Tereka">
                                            @error('stk_sd_m3_tereka')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_m3_tertunjuk') is-invalid @enderror" wire:model="stk_sd_m3_tertunjuk"
                                                placeholder="M3 Tertunjuk">
                                            @error('stk_sd_m3_tertunjuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_m3_terukur') is-invalid @enderror" wire:model="stk_sd_m3_terukur"
                                                placeholder="M3 Terukur">
                                            @error('stk_sd_m3_terukur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_mt_tereka') is-invalid @enderror" wire:model="stk_sd_mt_tereka"
                                                placeholder="MT Tereka">
                                            @error('stk_sd_mt_tereka')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_mt_tertunjuk') is-invalid @enderror" wire:model="stk_sd_mt_tertunjuk"
                                                placeholder="MT Tertunjuk">
                                            @error('stk_sd_mt_tertunjuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_sd_mt_terukur') is-invalid @enderror" wire:model="stk_sd_mt_terukur"
                                                placeholder="MT Terukur">
                                            @error('stk_sd_mt_terukur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_luas_sumber_daya') is-invalid @enderror" wire:model="stk_luas_sumber_daya"
                                                placeholder="Luas SD">
                                            @error('stk_luas_sumber_daya')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm @error('stk_sd_tenaga_ahli') is-invalid @enderror" wire:model="stk_sd_tenaga_ahli"
                                                placeholder="Tenaga Ahli">
                                            @error('stk_sd_tenaga_ahli')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_cadang_m3_terkira') is-invalid @enderror" wire:model="stk_cadang_m3_terkira"
                                                placeholder="M3 Terkira">
                                            @error('stk_cadang_m3_terkira')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_cadang_m3_terbukti') is-invalid @enderror" wire:model="stk_cadang_m3_terbukti"
                                                placeholder="M3 Terbukti">
                                            @error('stk_cadang_m3_terbukti')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_cadang_mt_terkira') is-invalid @enderror" wire:model="stk_cadang_mt_terkira"
                                                placeholder="MT Terkira">
                                            @error('stk_cadang_mt_terkira')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_cadang_mt_terbukti') is-invalid @enderror" wire:model="stk_cadang_mt_terbukti"
                                                placeholder="MT Terbukti">
                                            @error('stk_cadang_mt_terbukti')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_luas_cadangan') is-invalid @enderror" wire:model="stk_luas_cadangan"
                                                placeholder="Luas Cadangan">
                                            @error('stk_luas_cadangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm @error('stk_cadang_tenaga_ahli') is-invalid @enderror" wire:model="stk_cadang_tenaga_ahli"
                                                placeholder="Tenaga Ahli">
                                            @error('stk_cadang_tenaga_ahli')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_target_produksi_m3') is-invalid @enderror" wire:model="stk_target_produksi_m3"
                                                placeholder="Produksi M3">
                                            @error('stk_target_produksi_m3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm @error('stk_target_produksi_mt') is-invalid @enderror" wire:model="stk_target_produksi_mt"
                                                placeholder="Produksi MT">
                                            @error('stk_target_produksi_mt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><button type="button" class="btn btn-success btn-sm text-white text-nowrap" wire:click="store"><i class="ri-add-line"></i> Tambah</button></td>
                                    </tr>
                                </tbody>
                            </table>
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
        $wire.on('store-success', (event) => {
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
