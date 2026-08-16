<div>
    {{-- Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penduduk</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            {{-- <a href="{{ route('dashboard') }}">Dashboard</a> --}}
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Penduduk
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Card --}}
            <div class="card">

                {{-- Card Header --}}
                <div class="card-header">
                    <div class="row align-items-center">

                        <div class="col-md-6">
                            <h3 class="card-title">
                                Data Penduduk
                            </h3>
                        </div>

                        <div class="col-md-6 text-md-right mt-2 mt-md-0">
                            <button type="button" class="btn btn-primary" wire:click="$dispatch('open-penduduk-form')">
                                <i class="fas fa-plus mr-1"></i>
                                Tambah Penduduk
                            </button>
                            {{-- <a href="{{ route('penduduk.create') }}" href="#" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i>
                                Tambah Penduduk
                            </a> --}}
                        </div>

                    </div>
                </div>

                {{-- Card Body --}}
                <div class="card-body">

                    {{-- Search --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" wire:model.live="search" class="form-control"
                                    placeholder="Cari NIK, No. KK, atau nama...">

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NIK</th>
                                    <th>No. KK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Telepon</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($penduduk as $item)
                                    <tr wire:key="penduduk-{{ $item->id }}">

                                        <td>
                                            {{ $penduduk->firstItem() + $loop->index }}
                                        </td>

                                        <td>
                                            {{ $item->nik }}
                                        </td>

                                        <td>
                                            {{ $item->no_kk }}
                                        </td>

                                        <td>
                                            {{ $item->nama_lengkap }}
                                        </td>

                                        <td>
                                            {{ ucfirst($item->jenis_kelamin) }}
                                        </td>

                                        <td>
                                            {{ $item->no_telp }}
                                        </td>

                                        <td>
                                            <div class="btn-group">

                                                {{-- Detail --}}
                                                <a {{-- href="{{ route('penduduk.show', $item) }}" --}} href="#" class="btn btn-sm btn-info"
                                                    title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                {{-- Edit --}}
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    wire:click="$dispatch('edit-penduduk', { id: {{ $item->id }} })"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                            </div>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <div class="py-3">
                                                <i class="fas fa-users fa-2x text-muted mb-2"></i>

                                                <p class="mb-0 text-muted">
                                                    Tidak ada data penduduk.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                {{-- Card Footer --}}
                @if ($penduduk->hasPages())
                    <div class="card-footer">
                        {{ $penduduk->links() }}
                    </div>
                @endif

            </div>

        </div>
    </section>

    {{-- Form Modal --}}
    <livewire:penduduk.form />
</div>
