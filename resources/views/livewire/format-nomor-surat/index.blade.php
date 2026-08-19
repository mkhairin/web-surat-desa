<div>

    {{-- Header --}}
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">
                        Format Nomor Surat
                    </h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Format Nomor Surat
                        </li>

                    </ol>

                </div>

            </div>

        </div>
    </div>


    {{-- Main Content --}}
    <section class="content">

        <div class="container-fluid">

            <div class="card">

                {{-- Header --}}
                <div class="card-header">

                    <div class="row align-items-center">

                        <div class="col-md-6">

                            <h3 class="card-title">
                                Data Format Nomor Surat
                            </h3>

                        </div>

                        <div class="col-md-6 text-md-right mt-2 mt-md-0">

                            <button
                                type="button"
                                class="btn btn-primary"
                                wire:click="$dispatch('open-format-nomor-surat-form')"
                            >
                                <i class="fas fa-plus mr-1"></i>
                                Tambah Format
                            </button>

                        </div>

                    </div>

                </div>


                {{-- Body --}}
                <div class="card-body">

                    {{-- Filters --}}
                    <div class="row mb-3">

                        {{-- Jenis Surat --}}
                        <div class="col-md-4">

                            <label for="jenisSuratId">
                                Jenis Surat
                            </label>

                            <select
                                id="jenisSuratId"
                                wire:model.live="jenisSuratId"
                                class="form-control"
                            >

                                <option value="">
                                    Semua Jenis Surat
                                </option>

                                @foreach ($jenisSurat as $jenis)

                                    <option value="{{ $jenis->id }}">
                                        {{ $jenis->kode_surat }}
                                        -
                                        {{ $jenis->nama_surat }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Tahun --}}
                        <div class="col-md-2">

                            <label for="year">
                                Tahun
                            </label>

                            <select
                                id="year"
                                wire:model.live="year"
                                class="form-control"
                            >

                                <option value="">
                                    Semua Tahun
                                </option>

                                @foreach ($years as $itemYear)

                                    <option value="{{ $itemYear }}">
                                        {{ $itemYear }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Search --}}
                        <div class="col-md-6">

                            <label for="search">
                                Pencarian
                            </label>

                            <div class="input-group">

                                <input
                                    type="text"
                                    id="search"
                                    wire:model.live.debounce.300ms="search"
                                    class="form-control"
                                    placeholder="Cari format nomor surat..."
                                >

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

                                    <th width="5%">
                                        No
                                    </th>

                                    <th width="20%">
                                        Jenis Surat
                                    </th>

                                    <th width="8%">
                                        Tahun
                                    </th>

                                    <th>
                                        Format
                                    </th>

                                    <th width="12%">
                                        Nomor Terakhir
                                    </th>

                                    <th width="10%">
                                        Status
                                    </th>

                                    <th width="12%">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($formatNomorSurat as $item)

                                    <tr wire:key="format-nomor-{{ $item->id }}">

                                        {{-- No --}}
                                        <td>
                                            {{ $formatNomorSurat->firstItem() + $loop->index }}
                                        </td>


                                        {{-- Jenis Surat --}}
                                        <td>

                                            <span class="badge badge-secondary">
                                                {{ $item->jenisSurat->kode_surat }}
                                            </span>

                                            <br>

                                            <small>
                                                {{ $item->jenisSurat->nama_surat }}
                                            </small>

                                        </td>


                                        {{-- Tahun --}}
                                        <td>
                                            {{ $item->year }}
                                        </td>


                                        {{-- Format --}}
                                        <td>

                                            <code>
                                                {{ $item->format }}
                                            </code>

                                        </td>


                                        {{-- Current Number --}}
                                        <td class="text-center">

                                            <span class="badge badge-info">
                                                {{ $item->current_number }}
                                            </span>

                                        </td>


                                        {{-- Status --}}
                                        <td>

                                            @if ($item->is_active)

                                                <span class="badge badge-success">
                                                    Aktif
                                                </span>

                                            @else

                                                <span class="badge badge-secondary">
                                                    Tidak Aktif
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Actions --}}
                                        <td>

                                            <div class="btn-group">

                                                {{-- Edit --}}
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-warning"
                                                    wire:click="$dispatch('edit-format-nomor-surat', { id: {{ $item->id }} })"
                                                    title="Edit"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </button>


                                                {{-- Toggle Status --}}
                                                <button
                                                    type="button"
                                                    class="btn btn-sm {{ $item->is_active ? 'btn-danger' : 'btn-success' }}"
                                                    wire:click="toggleStatus({{ $item->id }})"
                                                    title="{{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}"
                                                >

                                                    <i class="fas {{ $item->is_active ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>

                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="7"
                                            class="text-center"
                                        >

                                            <div class="py-4">

                                                <i
                                                    class="fas fa-sort-numeric-down fa-2x text-muted mb-2"
                                                ></i>

                                                <p class="mb-0 text-muted">
                                                    Belum ada format nomor surat.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- Pagination --}}
                @if ($formatNomorSurat->hasPages())

                    <div class="card-footer">

                        {{ $formatNomorSurat->links() }}

                    </div>

                @endif

            </div>

        </div>

    </section>


    {{-- Form --}}
    {{-- <livewire:format-nomor-surat.form /> --}}

</div>