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
                            <h6 class="card-title m-0">Tambah Rencana Reklamasi | {{ session('nama_pemegang_perizinan') }}</h6>
                            <a href="{{ route('rr.show', session('id_perusahaan')) }}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="save({{ session('id_perusahaan') }})" x-data="{ editing: true }">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">No Persetujuan</label>
                                        <input type="text" class="form-control @error('rr_no_persetujuan') is-invalid @enderror" wire:model="rr_no_persetujuan">
                                        @error('rr_no_persetujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tanggal Persetujuan</label>
                                        <input type="date" class="form-control @error('rr_tgl_persetujuan') is-invalid @enderror" wire:model="rr_tgl_persetujuan">
                                        @error('rr_tgl_persetujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Tahun</label>
                                        <input type="text" class="form-control @error('rr_tahun') is-invalid @enderror" wire:model="rr_tahun">
                                        @error('rr_tahun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Nominal yang Ditetapkan</label>
                                        <input type="number" class="form-control @error('rr_nominal_yang_ditetapkan') is-invalid @enderror" wire:model="rr_nominal_yang_ditetapkan">
                                        @error('rr_nominal_yang_ditetapkan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Nominal yang Ditempatkan</label>
                                        <input type="number" class="form-control @error('rr_nominal_yang_ditempatkan') is-invalid @enderror" wire:model="rr_nominal_yang_ditempatkan">
                                        @error('rr_nominal_yang_ditempatkan')
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
