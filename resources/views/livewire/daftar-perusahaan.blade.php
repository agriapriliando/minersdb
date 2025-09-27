<div>
    <!-- Top Row Widgets-->
    <div class="row">
        <!-- Tabel Perusahaan-->
        <div class="col-12">
            <div class="card">
                <div class="card-body" x-data="{
                    copyTable() {
                        let rows = Array.from(document.querySelectorAll('#tabel-perusahaan tr'));
                        let text = rows.map(row => {
                            // Ambil hanya data dari <td> (atau <th> kalau mau)
                            return Array.from(row.querySelectorAll('th,td'))
                                .map(cell => cell.innerText)
                                .join('\t'); // Tab sebagai pemisah kolom
                        }).join('\n'); // Enter sebagai pemisah baris
                
                        // Copy ke clipboard
                        navigator.clipboard.writeText(text).then(() => {
                            alert('Data tabel berhasil disalin!');
                        });
                    },
                }">
                    @session('error')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endsession
                    <!-- Actions-->
                    <div class="d-md-flex align-items-center mb-3">
                        <button class="btn btn-outline-secondary text-body me-2" type="button" wire:click="resetFilters"><i class="ri-refresh-line align-bottom"></i> Reset</button>
                        <div class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center me-2 mb-2">
                            <input wire:model.live="search" class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" placeholder="Cari Nama Perusahaan">
                        </div>
                        <form class="d-none bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center me-2 mb-2">
                            <input wire:model.live="kabupaten_kotaSearch" class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search" placeholder="Kabupaten/Kota"
                                list="kabupatenKotaList" aria-label="Search">

                            <datalist id="kabupatenKotaList">
                                @foreach ($kabupaten_kota as $item)
                                    <option value="{{ $item }}">
                                @endforeach
                            </datalist>
                        </form>
                        <div class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center me-2 mb-2">
                            <input wire:model.live="kabupaten_kotaSearch" class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" list="kabupatenKotaList"
                                placeholder="==Kabupaten/Kota==">

                            <datalist id="kabupatenKotaList">
                                @foreach ($kabupaten_kota as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center me-2 mb-2">
                            <input wire:model.live="komoditasSearch" class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" list="komoditasList" placeholder="==Komoditas==">
                            <datalist id="komoditasList">
                                @foreach ($komoditas as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="d-md-flex align-items-center">
                            <select wire:model.live="perPage" class="form-select me-2 mb-2 rounded" style="max-width: 200px">
                                <option>==Halaman==</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="{{ $profiles->total() }}">{{ $profiles->total() }} All</option>
                            </select>
                            <div class="d-flex justify-content-end mb-2">
                                <a href="{{ route('exports.view') }}" class="btn btn-outline-secondary btn-sm text-body me-2"><i class="ri-download-fill align-bottom"></i> Export</a>
                                <a class="btn btn-sm btn-primary me-2" href="{{ route('profile.create') }}"><i class="ri-add-circle-line align-bottom"></i> Tambah</a>
                                <button class="d-none btn btn-success btn-sm text-white" @click="copyTable">Copy Data</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Actions-->

                    <!-- Table-->
                    <div class="table-responsive">
                        <table class="table m-0 table-striped" id="tabel-perusahaan">
                            <thead>
                                <tr>
                                    <th width="1">No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Komoditas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $item)
                                    <tr>
                                        <td>
                                            {{ ($profiles->currentPage() - 1) * $profiles->perPage() + $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->nama_pemegang_perizinan }}
                                        </td>
                                        <td>{{ $item->kabupaten_kota }}</td>
                                        <td>{{ $item->komoditas }}</td>
                                        <td>
                                            <a href="{{ route('profile.show', $item->id) }}" class="btn btn-sm btn-primary"> <i class="ri-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $profiles->links('custom-pagination') }}
                    </div>
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
