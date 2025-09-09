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
                            <h6 class="card-title m-0">Rencana Reklamasi | {{ session('nama_pemegang_perizinan') }}</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" class="btn btn-primary btn-sm">Profil</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th class="text-nowrap">No. Persetujuan</th>
                                        <th class="text-nowrap">Tanggal Persetujuan</th>
                                        <th class="text-nowrap">Tahun</th>
                                        <th class="text-nowrap">Nominal Ditetapkan</th>
                                        <th class="text-nowrap">Nominal Ditempatkan</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rr as $id => $item)
                                        <tr wire:key="rr-row-{{ $id }}" x-data="{ confirmDelete: false }">
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- No. Persetujuan --}}
                                            <td>
                                                <input type="text" class="form-control form-control-sm @error('rr.' . $id . '.rr_no_persetujuan') is-invalid @enderror"
                                                    wire:model="rr.{{ $id }}.rr_no_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('rr.' . $id . '.rr_no_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tanggal Persetujuan --}}
                                            <td>
                                                <input type="date" class="form-control form-control-sm @error('rr.' . $id . '.rr_tgl_persetujuan') is-invalid @enderror"
                                                    wire:model="rr.{{ $id }}.rr_tgl_persetujuan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('rr.' . $id . '.rr_tgl_persetujuan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Tahun --}}
                                            <td class="text-nowrap" style="min-width: 90px">
                                                <input type="number" class="form-control form-control-sm @error('rr.' . $id . '.rr_tahun') is-invalid @enderror"
                                                    wire:model="rr.{{ $id }}.rr_tahun" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('rr.' . $id . '.rr_tahun')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Nominal Ditetapkan --}}
                                            <td>
                                                <input type="text" class="form-control form-control-sm @error('rr.' . $id . '.rr_nominal_yang_ditetapkan') is-invalid @enderror"
                                                    wire:model="rr.{{ $id }}.rr_nominal_yang_ditetapkan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('rr.' . $id . '.rr_nominal_yang_ditetapkan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            {{-- Nominal Ditempatkan --}}
                                            <td>
                                                <input type="text" class="form-control form-control-sm @error('rr.' . $id . '.rr_nominal_yang_ditempatkan') is-invalid @enderror"
                                                    wire:model="rr.{{ $id }}.rr_nominal_yang_ditempatkan" :disabled="$wire.editingId !== {{ $id }}">
                                                @error('rr.' . $id . '.rr_nominal_yang_ditempatkan')
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
                                            <input type="text" class="form-control form-control-sm @error('rr_no_persetujuan') is-invalid @enderror" wire:model="rr_no_persetujuan"
                                                placeholder="No. Persetujuan">
                                            @error('rr_no_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="date" class="form-control form-control-sm @error('rr_tgl_persetujuan') is-invalid @enderror" wire:model="rr_tgl_persetujuan">
                                            @error('rr_tgl_persetujuan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm @error('rr_tahun') is-invalid @enderror" wire:model="rr_tahun" placeholder="Tahun">
                                            @error('rr_tahun')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm @error('rr_nominal_yang_ditetapkan') is-invalid @enderror"
                                                wire:model="rr_nominal_yang_ditetapkan" placeholder="Nominal Ditetapkan">
                                            @error('rr_nominal_yang_ditetapkan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm @error('rr_nominal_yang_ditempatkan') is-invalid @enderror"
                                                wire:model="rr_nominal_yang_ditempatkan" placeholder="Nominal Ditempatkan">
                                            @error('rr_nominal_yang_ditempatkan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
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
