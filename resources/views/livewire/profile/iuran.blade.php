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
                            <h6 class="card-title m-0">Iuran Tetap Tahunan | {{ session('nama_pemegang_perizinan') }}</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" wire:navigate class="btn btn-primary btn-sm">Kembali</a>
                                <a href="{{ route('iuran.add') }}" wire:navigate class="btn btn-primary btn-sm"><i class="ri-add-line"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($iuran as $index => $item)
                                <form wire:submit.prevent="update({{ $item['id'] }})" x-data="{ editing: false, confirmDelete: false }" wire:key="iuran-row-{{ $item['id'] }}">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <span class="fw-bold">{{ $loop->iteration }}.</span> Nominal Iuran (Rp)
                                            </label>
                                            <input type="text" class="form-control @error('iuran.' . $index . '.iuran_tetap_per_tahun_nominal') is-invalid @enderror"
                                                wire:model="iuran.{{ $index }}.iuran_tetap_per_tahun_nominal" :disabled="!editing">
                                            @error('iuran.' . $index . '.iuran_tetap_per_tahun_nominal')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tanggal Bayar</label>
                                            <input type="date" class="form-control @error('iuran.' . $index . '.iuran_tetap_per_tahun_tgl_bayar') is-invalid @enderror"
                                                wire:model="iuran.{{ $index }}.iuran_tetap_per_tahun_tgl_bayar" :disabled="!editing">
                                            @error('iuran.' . $index . '.iuran_tetap_per_tahun_tgl_bayar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2 align-items-center">
                                        {{-- Simpan --}}
                                        <button type="submit" class="btn btn-primary btn-sm" x-show="editing" @click="editing = false">
                                            Simpan
                                        </button>

                                        {{-- Edit / Batal (reset nilai dari DB via method batal) --}}
                                        <button type="button" class="btn btn-secondary btn-sm" @click="editing = !editing" wire:click="batal({{ $index }})">
                                            <i class="ri-edit-line"></i>
                                            <span x-text="editing ? 'Batal' : 'Edit'"></span>
                                        </button>

                                        {{-- Hapus --}}
                                        <button type="button" class="btn btn-danger btn-sm text-white" @click.stop="confirmDelete = true">
                                            <i class="ri-delete-bin-line"></i> Hapus
                                        </button>

                                        {{-- Alert konfirmasi hapus --}}
                                        <div x-cloak x-show="confirmDelete" x-transition>
                                            <span class="me-2">Yakin ingin menghapus data ini?</span>
                                            <button type="button" class="btn btn-danger btn-sm" @click="confirmDelete = false" wire:click="delete({{ $item['id'] }})">
                                                Ya
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-sm" @click="confirmDelete = false">
                                                Batal
                                            </button>
                                        </div>
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
