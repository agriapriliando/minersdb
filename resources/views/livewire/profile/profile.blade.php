<div>
    <!-- Top Row Widgets-->
    <div class="row">
        <!-- Tabel Perusahaan-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Example-->
                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">{{ $profile->nama_pemegang_perizinan }}</h6>
                            <a href="{{ route('home') }}" wire:navigate class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Pemegang Perizinan</label>
                                        <input type="text" class="form-control" value="{{ $profile->nama_pemegang_perizinan }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kabupaten / Kota</label>
                                        <input type="text" class="form-control" value="{{ $profile->kabupaten_kota }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" value="{{ $profile->kecamatan }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Desa / Kelurahan</label>
                                        <input type="text" class="form-control" value="{{ $profile->desa_kelurahan }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Luas (Ha)</label>
                                        <input type="text" class="form-control" value="{{ $profile->luas_ha }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tahapan IUP</label>
                                        <input type="text" class="form-control" value="{{ $profile->tahapan_iup }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Komoditas</label>
                                        <input type="text" class="form-control" value="{{ $profile->komoditas }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nomor Induk Berusaha (NIB)</label>
                                        <input type="text" class="form-control" value="{{ $profile->nomor_induk_berusaha_nib }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nomor NPWP</label>
                                        <input type="text" class="form-control" value="{{ $profile->nomor_npwp }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status NPWP</label>
                                        <input type="text" class="form-control" value="{{ $profile->status_npwp }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis Izin</label>
                                        <input type="text" class="form-control" value="{{ $profile->jenis_izin }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nomor SK Izin</label>
                                        <input type="text" class="form-control" value="{{ $profile->nomor_sk_izin }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Terbit Izin</label>
                                        <input type="date" class="form-control" value="{{ $profile->tgl_terbit_izin ? $profile->tgl_terbit_izin->format('Y-m-d') : '' }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Berakhir Izin</label>
                                        <input type="date" class="form-control" value="{{ $profile->tgl_berakhir_izin ? $profile->tgl_berakhir_izin->format('Y-m-d') : '' }}" disabled>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Alamat Perusahaan (Sesuai SK Izin)</label>
                                        <textarea class="form-control" rows="3" disabled>{{ $profile->alamat_perusahaan_berdasarkan_sk_izin }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Direktur (Sesuai SK Izin)</label>
                                        <input type="text" class="form-control" value="{{ $profile->nama_direktur_sesuai_sk_izin }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Dewan Direksi (BOD)</label>
                                        <input type="text" class="form-control" value="{{ $profile->dewan_direksi_bod }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Modal Kerja</label>
                                        <input type="text" class="form-control" value="{{ $profile->modal_kerja }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama PIC</label>
                                        <input type="text" class="form-control" value="{{ $profile->nama_pic }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No. HP PIC</label>
                                        <input type="text" class="form-control" value="{{ $profile->no_hp_pic }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Resmi Perusahaan</label>
                                        <input type="email" class="form-control" value="{{ $profile->email_resmi_perusahaan }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIB Email OSS</label>
                                        <input type="email" class="form-control" value="{{ $profile->nib_email_oss }}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">NIB Nomor HP OSS</label>
                                        <input type="text" class="form-control" value="{{ $profile->nib_nomor_hp_oss }}" disabled>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea class="form-control" rows="3" disabled>{{ $profile->keterangan }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary d-none">Kembali</button>
                                <a href="{{ route('home') }}" wire:navigate class="btn btn-primary">Kembali</a>
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
