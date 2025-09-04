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
                            <h6 class="card-title m-0">Tambah Persetujuan Lingkungan | {{ session('nama_pemegang_perizinan') }}</h6>
                            <a href="{{ route('pl.show', session('id_perusahaan')) }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="save({{ session('id_perusahaan') }})" x-data="{ editing: true }">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">No Persetujuan</label>
                                        <input type="text" class="form-control @error('persetujuan_lingkungan_nomor') is-invalid @enderror" wire:model="persetujuan_lingkungan_nomor">
                                        @error('persetujuan_lingkungan_nomor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control @error('persetujuan_lingkungan_tgl') is-invalid @enderror" wire:model="persetujuan_lingkungan_tgl">
                                        @error('persetujuan_lingkungan_tgl')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Target Produksi</label>
                                        <input type="number" class="form-control @error('persetujuan_lingkungan_target_produksi') is-invalid @enderror"
                                            wire:model="persetujuan_lingkungan_target_produksi">
                                        @error('persetujuan_lingkungan_target_produksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Wilayah Izin</label>
                                        <input type="text" class="form-control @error('persetujuan_lingkungan_wilayah_izin') is-invalid @enderror" wire:model="persetujuan_lingkungan_wilayah_izin">
                                        @error('persetujuan_lingkungan_wilayah_izin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Area Penunjang</label>
                                        <input type="text" class="form-control @error('persetujuan_lingkungan_area_penunjang') is-invalid @enderror"
                                            wire:model="persetujuan_lingkungan_area_penunjang">
                                        @error('persetujuan_lingkungan_area_penunjang')
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
