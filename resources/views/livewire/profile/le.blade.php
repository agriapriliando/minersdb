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
                            <h6 class="card-title m-0">Laporan Eksplorasi | {{ session('nama_pemegang_perizinan') }}</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" wire:navigate class="btn btn-primary btn-sm">Profil</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th class="text-nowrap">No. Persetujuan</th>
                                        <th class="text-nowrap">Tanggal Persetujuan</th>
                                        <th class="text-nowrap">SD M³ Tereka</th>
                                        <th class="text-nowrap">SD M³ Tertunjuk</th>
                                        <th class="text-nowrap">SD M³ Terukur</th>
                                        <th class="text-nowrap">SD MT Tereka</th>
                                        <th class="text-nowrap">SD MT Tertunjuk</th>
                                        <th class="text-nowrap">SD MT Terukur</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($le as $id => $item)
                                        <tr wire:key="le-row-{{ $id }}" x-data="{ confirmDelete: false }">
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- No. Persetujuan --}}
                                            <td>
                                                <input type="text" class="form-control form-control-sm @error('le.' . $id . '.le_no_persetujuan') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_no_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_no_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tanggal Persetujuan --}}
                                            <td>
                                                <input type="date" class="form-control form-control-sm @error('le.' . $id . '.le_tgl_persetujuan') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_tgl_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_tgl_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M³ Tereka --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_m3_tereka') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_m3_tereka" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_m3_tereka')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M³ Tertunjuk --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_m3_tertunjuk') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_m3_tertunjuk" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_m3_tertunjuk')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD M³ Terukur --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_m3_terukur') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_m3_terukur" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_m3_terukur')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Tereka --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_mt_tereka') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_mt_tereka" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_mt_tereka')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Tertunjuk --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_mt_tertunjuk') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_mt_tertunjuk" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_mt_tertunjuk')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- SD MT Terukur --}}
                                            <td>
                                                <input type="number" step="any" class="form-control form-control-sm @error('le.' . $id . '.le_sd_mt_terukur') is-invalid @enderror"
                                                    wire:model="le.{{ $id }}.le_sd_mt_terukur" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('le.' . $id . '.le_sd_mt_terukur')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tombol Aksi --}}
                                            <td>
                                                <div class="d-flex flex-wrap gap-1">
                                                    {{-- Simpan --}}
                                                    <button type="button" class="btn btn-primary btn-sm" wire:click="update({{ $id }})" x-show="$wire.editingId === {{ $id }}">
                                                        Simpan
                                                    </button>

                                                    {{-- Edit --}}
                                                    <button type="button" class="btn btn-secondary btn-sm" @click="$wire.editingId = {{ $id }}"
                                                        x-show="$wire.editingId !== {{ $id }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    {{-- Batal --}}
                                                    <button type="button" class="btn btn-secondary btn-sm" wire:click="batal({{ $id }})" x-show="$wire.editingId === {{ $id }}">
                                                        <i class="ri-close-line"></i>
                                                    </button>

                                                    {{-- Hapus --}}
                                                    <button type="button" class="btn btn-danger btn-sm text-white" @click.stop="confirmDelete = true"
                                                        x-show="$wire.editingId !== {{ $id }}">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </div>

                                                {{-- Konfirmasi hapus --}}
                                                <div x-cloak x-show="confirmDelete" x-transition class="mt-2">
                                                    <span class="small d-block mb-1">Yakin hapus?</span>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="btn btn-danger btn-sm" @click="confirmDelete = false" wire:click="delete({{ $id }})">
                                                            Ya
                                                        </button>
                                                        <button type="button" class="btn btn-secondary btn-sm" @click="confirmDelete = false">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- Form tambah data baru --}}
                                    <tr>
                                        <td>+</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm @error('le_no_persetujuan') is-invalid @enderror" wire:model="le_no_persetujuan"
                                                placeholder="No. Persetujuan">
                                            @error('le_no_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="date" class="form-control form-control-sm @error('le_tgl_persetujuan') is-invalid @enderror" wire:model="le_tgl_persetujuan">
                                            @error('le_tgl_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_m3_tereka" placeholder="M³ Tereka"></td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_m3_tertunjuk" placeholder="M³ Tertunjuk"></td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_m3_terukur" placeholder="M³ Terukur"></td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_mt_tereka" placeholder="MT Tereka"></td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_mt_tertunjuk" placeholder="MT Tertunjuk"></td>
                                        <td><input type="number" step="any" class="form-control form-control-sm" wire:model="le_sd_mt_terukur" placeholder="MT Terukur"></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm text-white text-nowrap" wire:click="store">
                                                <i class="ri-add-line"></i> Tambah
                                            </button>
                                        </td>
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
