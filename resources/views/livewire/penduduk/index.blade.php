<div>
    {{-- Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="fas fa-users mr-2 text-primary"></i>Data Penduduk
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Penduduk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Alert Notifikasi --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Card Utama --}}
            <div class="card card-outline shadow-sm">

                {{-- Card Header --}}
                <div
                    class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                    <h3 class="card-title font-weight-bold mb-2 mb-md-0">
                        <i class="fas fa-list-alt text-primary mr-1"></i> Daftar Penduduk
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm shadow-sm font-weight-bold"
                            wire:click="$dispatch('open-penduduk-form')">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Penduduk
                        </button>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="card-body">

                    {{-- Search Filter --}}
                    <div class="row mb-4">
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group shadow-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" wire:model.live="search" class="form-control border-left-0"
                                    placeholder="Cari NIK, No. KK, atau Nama Lengkap...">
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive border rounded">
                        <table class="table table-sm table-hover table-striped mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th>NIK</th>
                                    <th>No. KK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No. Telepon</th>
                                    <th width="12%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penduduk as $item)
                                    <tr wire:key="penduduk-{{ $item->id }}">
                                        <td class="text-center align-middle">
                                            {{ $penduduk->firstItem() + $loop->index }}
                                        </td>
                                        <td class="align-middle text-nowrap"><span
                                                class="badge badge-info">{{ $item->nik }}</span></td>
                                        <td class="align-middle text-nowrap">{{ $item->no_kk }}</td>
                                        <td class="align-middle font-weight-bold">{{ $item->nama_lengkap }}</td>
                                        <td class="align-middle">{{ ucfirst($item->jenis_kelamin) }}</td>
                                        <td class="align-middle">{{ ucfirst($item->agama) }}</td>
                                        <td class="align-middle">{{ $item->no_telp ?? '-' }}</td>

                                        <td class="text-center align-middle text-nowrap">
                                            {{-- Detail --}}
                                            <a href="{{ route('penduduk.show', $item) }}"
                                                class="btn btn-sm btn-info shadow-sm rounded" data-toggle="tooltip"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <button type="button" class="btn btn-sm btn-warning shadow-sm rounded ml-1"
                                                wire:click="$dispatch('edit-penduduk', { id: {{ $item->id }} })"
                                                data-toggle="tooltip" title="Edit Data">
                                                <i class="fas fa-edit text-dark"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center bg-white py-5">
                                            <div class="d-flex flex-column align-items-center justify-content-center">
                                                <i class="fas fa-users-slash fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted font-weight-bold mb-0">Data Penduduk Tidak
                                                    Ditemukan</h5>
                                                <p class="text-muted text-sm">Coba gunakan kata kunci pencarian yang
                                                    berbeda.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                {{-- Card Footer (Pagination) --}}
                @if ($penduduk->hasPages())
                    <div class="card-footer bg-white pt-3">
                        <div class="d-flex justify-content-center justify-content-md-end">
                            {{-- Memperbaiki render pagination Livewire/Bootstrap --}}
                            {{ $penduduk->links(data: ['scrollTo' => true]) }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- Form Modal --}}
    <livewire:penduduk.form />
</div>
