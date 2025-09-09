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
                    <div class="card mb-4" x-data="{ showSD: true, showCAD: true }">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">RKABOP | {{ session('nama_pemegang_perizinan') }}</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.show', session('id_perusahaan')) }}" wire:navigate class="btn btn-primary btn-sm">Profil</a>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>No Persetujuan</th>
                                        <th>Tgl Persetujuan</th>

                                        {{-- Sumber Daya Thn I --}}
                                        <th x-show="showSD">SD I M3 Tereka</th>
                                        <th x-show="showSD">SD I M3 Tertunjuk</th>
                                        <th x-show="showSD">SD I M3 Terukur</th>
                                        <th x-show="showSD">SD I MT Tereka</th>
                                        <th x-show="showSD">SD I MT Tertunjuk</th>
                                        <th x-show="showSD">SD I MT Terukur</th>

                                        {{-- Sumber Daya Thn II --}}
                                        <th x-show="showSD">SD II M3 Tereka</th>
                                        <th x-show="showSD">SD II M3 Tertunjuk</th>
                                        <th x-show="showSD">SD II M3 Terukur</th>
                                        <th x-show="showSD">SD II MT Tereka</th>
                                        <th x-show="showSD">SD II MT Tertunjuk</th>
                                        <th x-show="showSD">SD II MT Terukur</th>

                                        {{-- Sumber Daya Thn III --}}
                                        <th x-show="showSD">SD III M3 Tereka</th>
                                        <th x-show="showSD">SD III M3 Tertunjuk</th>
                                        <th x-show="showSD">SD III M3 Terukur</th>
                                        <th x-show="showSD">SD III MT Tereka</th>
                                        <th x-show="showSD">SD III MT Tertunjuk</th>
                                        <th x-show="showSD">SD III MT Terukur</th>

                                        {{-- Tenaga Ahli --}}
                                        <th x-show="showSD">Competent Person</th>

                                        {{-- Cadangan --}}
                                        <th>Cad I Terkira</th>
                                        <th>Cad I Terbukti</th>
                                        <th>Cad II Terkira</th>
                                        <th>Cad II Terbukti</th>
                                        <th>Cad III Terkira</th>
                                        <th>Cad III Terbukti</th>

                                        {{-- Produksi Thn I --}}
                                        <th>Prod I Target M3 Utama</th>
                                        <th>Prod I Target M3 Sampingan</th>
                                        <th>Prod I Realisasi M3 Utama</th>
                                        <th>Prod I Realisasi M3 Sampingan</th>
                                        <th>Prod I Target MT Utama</th>
                                        <th>Prod I Target MT Sampingan</th>
                                        <th>Prod I Realisasi MT Utama</th>
                                        <th>Prod I Realisasi MT Sampingan</th>

                                        {{-- Produksi Thn II --}}
                                        <th>Prod II Target M3 Utama</th>
                                        <th>Prod II Target M3 Sampingan</th>
                                        <th>Prod II Realisasi M3 Utama</th>
                                        <th>Prod II Realisasi M3 Sampingan</th>
                                        <th>Prod II Target MT Utama</th>
                                        <th>Prod II Target MT Sampingan</th>
                                        <th>Prod II Realisasi MT Utama</th>
                                        <th>Prod II Realisasi MT Sampingan</th>

                                        {{-- Produksi Thn III --}}
                                        <th>Prod III Target M3 Utama</th>
                                        <th>Prod III Target M3 Sampingan</th>
                                        <th>Prod III Realisasi M3 Utama</th>
                                        <th>Prod III Realisasi M3 Sampingan</th>
                                        <th>Prod III Target MT Utama</th>
                                        <th>Prod III Target MT Sampingan</th>
                                        <th>Prod III Realisasi MT Utama</th>
                                        <th>Prod III Realisasi MT Sampingan</th>

                                        {{-- Pajak --}}
                                        <th>Pajak I Daerah</th>
                                        <th>Pajak I Opsen</th>
                                        <th>Pajak II Daerah</th>
                                        <th>Pajak II Opsen</th>
                                        <th>Pajak III Daerah</th>
                                        <th>Pajak III Opsen</th>

                                        {{-- Tenaga Kerja Thn I --}}
                                        <th>TK I Lokal</th>
                                        <th>TK I Non Lokal</th>
                                        <th>TK I TKA</th>

                                        {{-- Tenaga Kerja Thn II --}}
                                        <th>TK II Lokal</th>
                                        <th>TK II Non Lokal</th>
                                        <th>TK II TKA</th>

                                        {{-- Tenaga Kerja Thn III --}}
                                        <th>TK III Lokal</th>
                                        <th>TK III Non Lokal</th>
                                        <th>TK III TKA</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <style>
                                    th {
                                        white-space: nowrap;
                                    }
                                </style>
                                <tbody>
                                    @foreach ($rkabop as $id => $item)
                                        <tr wire:key="rkabop-row-{{ $id }}" x-data="{ confirmDelete: false }">
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- Persetujuan --}}
                                            <td><input type="text" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_no_persetujuan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="date" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tgl_persetujuan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Sumber Daya I --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_m3_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_m3_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_m3_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_mt_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_mt_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_i_mt_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Sumber Daya II --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_m3_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_m3_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_m3_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_mt_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_mt_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_ii_mt_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Sumber Daya III --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_m3_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_m3_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_m3_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_mt_tereka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_mt_tertunjuk"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_sd_thn_iii_mt_terukur"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Tenaga Ahli --}}
                                            <td><input type="text" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_ahli_competent_person"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Cadangan --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_i_terkira"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_i_terbukti"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_ii_terkira"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_ii_terbukti"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_iii_terkira"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_cadangan_thn_iii_terbukti"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Produksi I --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_target_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_target_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_realisasi_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_realisasi_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_target_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_target_my_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_realisasi_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_i_realisasi_mt_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Produksi II --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_target_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_target_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_realisasi_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_realisasi_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_target_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_target_my_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_realisasi_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_ii_realisasi_mt_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Produksi III --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_target_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_target_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_realisasi_m3_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_realisasi_m3_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_target_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_target_my_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_realisasi_mt_utama"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_prod_thn_iii_realisasi_mt_sampingan"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Pajak --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_i_daerah"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_i_opsen"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_ii_daerah"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_ii_opsen"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_iii_daerah"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_pajak_thn_iii_opsen"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Tenaga Kerja I --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_i_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_i_non_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_i_tka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Tenaga Kerja II --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_ii_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_ii_non_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_ii_tka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Tenaga Kerja III --}}
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_iii_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_iii_non_lokal"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>
                                            <td><input type="number" class="form-control form-control-sm" wire:model="rkabop.{{ $id }}.rkab_tenaga_kerja_thn_iii_tka"
                                                    :disabled="$wire.editingId !== {{ $id }}"></td>

                                            {{-- Tombol Aksi --}}
                                            <td>
                                                <div class="d-flex flex-wrap gap-1">
                                                    {{-- Simpan --}}
                                                    <button type="button" class="btn btn-primary btn-sm" wire:click="update({{ $id }})"
                                                        x-show="$wire.editingId === {{ $id }}">
                                                        Simpan
                                                    </button>

                                                    {{-- Edit --}}
                                                    <button type="button" class="btn btn-secondary btn-sm" @click="$wire.editingId = {{ $id }}"
                                                        x-show="$wire.editingId !== {{ $id }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    {{-- Batal --}}
                                                    <button type="button" class="btn btn-secondary btn-sm" wire:click="batal({{ $id }})"
                                                        x-show="$wire.editingId === {{ $id }}">
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

                                    {{-- Tambah data baru --}}
                                    <tr>
                                        <td>+</td>
                                        {{-- Persetujuan --}}
                                        <td><input type="text" class="form-control form-control-sm" wire:model="newRkabop.rkab_no_persetujuan" placeholder="No Persetujuan"></td>
                                        <td><input type="date" class="form-control form-control-sm" wire:model="newRkabop.rkab_tgl_persetujuan"></td>

                                        {{-- Sumber Daya Tahun I --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_m3_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_m3_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_m3_terukur"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_mt_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_mt_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_i_mt_terukur"></td>

                                        {{-- Sumber Daya Tahun II --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_m3_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_m3_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_m3_terukur"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_mt_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_mt_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_ii_mt_terukur"></td>

                                        {{-- Sumber Daya Tahun III --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_m3_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_m3_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_m3_terukur"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_mt_tereka"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_mt_tertunjuk"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_sd_thn_iii_mt_terukur"></td>

                                        {{-- Tenaga Ahli --}}
                                        <td><input type="text" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_ahli_competent_person"></td>

                                        {{-- Cadangan --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_i_terkira"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_i_terbukti"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_ii_terkira"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_ii_terbukti"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_iii_terkira"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_cadangan_thn_iii_terbukti"></td>

                                        {{-- Produksi Tahun I --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_target_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_target_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_realisasi_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_realisasi_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_target_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_target_my_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_realisasi_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_i_realisasi_mt_sampingan"></td>

                                        {{-- Produksi Tahun II --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_target_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_target_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_realisasi_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_realisasi_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_target_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_target_my_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_realisasi_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_ii_realisasi_mt_sampingan"></td>

                                        {{-- Produksi Tahun III --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_target_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_target_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_realisasi_m3_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_realisasi_m3_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_target_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_target_my_sampingan"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_realisasi_mt_utama"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_prod_thn_iii_realisasi_mt_sampingan"></td>

                                        {{-- Pajak --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_i_daerah"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_i_opsen"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_ii_daerah"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_ii_opsen"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_iii_daerah"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_pajak_thn_iii_opsen"></td>

                                        {{-- Tenaga Kerja Tahun I --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_i_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_i_non_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_i_tka"></td>

                                        {{-- Tenaga Kerja Tahun II --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_ii_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_ii_non_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_ii_tka"></td>

                                        {{-- Tenaga Kerja Tahun III --}}
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_iii_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_iii_non_lokal"></td>
                                        <td><input type="number" class="form-control form-control-sm" wire:model="newRkabop.rkab_tenaga_kerja_thn_iii_tka"></td>

                                        <td>
                                            <button type="button" class="btn btn-success btn-sm text-white" wire:click="store">
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
