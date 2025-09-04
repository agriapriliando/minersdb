<div>
    <!-- Top Row Widgets-->
    <div class="row">
        <!-- Tabel Perusahaan-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Actions-->
                    <div class="d-md-flex justify-content-between align-items-center mb-3">
                        <form class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center me-2 mb-2">
                            <input wire:model.live="search" class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-link p-0 text-muted" type="submit"><i class="ri-search-2-line"></i></button>
                        </form>
                        <select class="form-select me-2 mb-2 rounded">
                            <option value="">==Komoditas==</option>
                        </select>
                        <select wire:model.live="perPage" class="form-select me-2 mb-2 rounded">
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                        <div class="d-flex justify-content-end mb-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm text-body me-2"><i class="ri-download-fill align-bottom"></i> Export</a>
                            <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> Tambah</a>
                        </div>
                    </div>
                    <!-- /Actions-->

                    <!-- Table-->
                    <div class="table-responsive">
                        <table class="table m-0 table-striped">
                            <thead>
                                <tr>
                                    <th width="1">No</th>
                                    <th>Nama Perusahaan</th>
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
                                            <div class="d-flex justify-content-start align-items-start">
                                                <div>
                                                    <p class="fw-bolder mb-1 d-flex align-items-center lh-1">{{ $item->nama_pemegang_perizinan }}
                                                        <span class="d-block f-w-4 ms-1 lh-1 text-primary">
                                                            <i class="ri-checkbox-circle-line"></i>
                                                        </span>
                                                    </p>
                                                    <span class="d-block text-muted">NIB : {{ $item->nomor_induk_berusaha_nib }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('profile.show', $item->id) }}" class="btn btn-sm btn-primary"> <i class="ri-eye-2-line"></i> Lihat</a>
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
