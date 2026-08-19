<div>

    {{-- Header --}}
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0">
                        Field Surat
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
                            Field Surat
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
                                Data Field Surat
                            </h3>

                        </div>

                        <div class="col-md-6 text-md-right mt-2 mt-md-0">

                            <button type="button" class="btn btn-primary"
                                wire:click="$dispatch('open-field-surat-form')">
                                <i class="fas fa-plus mr-1"></i>
                                Tambah Field
                            </button>

                        </div>

                    </div>

                </div>


                {{-- Body --}}
                <div class="card-body">

                    {{-- Filter --}}
                    <div class="row mb-3">

                        {{-- Jenis Surat --}}
                        <div class="col-md-4">

                            <label for="jenisSuratId">
                                Jenis Surat
                            </label>

                            <select id="jenisSuratId" wire:model.live="jenisSuratId" class="form-control">

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


                        {{-- Search --}}
                        <div class="col-md-6">

                            <label for="search">
                                Pencarian
                            </label>

                            <div class="input-group">

                                <input type="text" id="search" wire:model.live.debounce.300ms="search"
                                    class="form-control" placeholder="Cari nama field atau label...">

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

                        <table class="table table-sm table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th width="5%">
                                        No
                                    </th>

                                    <th>
                                        Jenis Surat
                                    </th>

                                    <th>
                                        Nama Field
                                    </th>

                                    <th>
                                        Label
                                    </th>

                                    <th width="12%">
                                        Tipe
                                    </th>

                                    <th width="10%">
                                        Wajib
                                    </th>

                                    <th width="8%">
                                        Urutan
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

                                @forelse ($fieldSurat as $item)
                                    <tr wire:key="field-surat-{{ $item->id }}">

                                        {{-- No --}}
                                        <td>
                                            {{ $fieldSurat->firstItem() + $loop->index }}
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


                                        {{-- Field Name --}}
                                        <td>

                                            <code>
                                                {{ $item->field_name }}
                                            </code>

                                        </td>


                                        {{-- Label --}}
                                        <td>
                                            {{ $item->field_label }}
                                        </td>


                                        {{-- Type --}}
                                        <td>

                                            @php
                                                $typeBadge = match ($item->field_type) {
                                                    'text' => 'primary',
                                                    'textarea' => 'info',
                                                    'number' => 'success',
                                                    'date' => 'warning',
                                                    'select' => 'dark',
                                                    'radio' => 'secondary',
                                                    'checkbox' => 'danger',
                                                    default => 'light',
                                                };
                                            @endphp

                                            <span class="badge badge-{{ $typeBadge }}">
                                                {{ $item->field_type }}
                                            </span>

                                        </td>


                                        {{-- Required --}}
                                        <td>

                                            @if ($item->is_required)
                                                <span class="badge badge-danger">
                                                    Wajib
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    Opsional
                                                </span>
                                            @endif

                                        </td>


                                        {{-- Sort --}}
                                        <td class="text-center">
                                            {{ $item->sort_order }}
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
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    wire:click="$dispatch('edit-field-surat', { id: {{ $item->id }} })"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                {{-- Toggle Status --}}
                                                <button type="button"
                                                    class="btn btn-sm {{ $item->is_active ? 'btn-danger' : 'btn-success' }}"
                                                    wire:click="toggleStatus({{ $item->id }})"
                                                    title="{{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <i
                                                        class="fas {{ $item->is_active ? 'fa-toggle-off' : 'fa-toggle-on' }}"></i>
                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="9" class="text-center">

                                            <div class="py-4">

                                                <i class="fas fa-list-alt fa-2x text-muted mb-2"></i>

                                                <p class="mb-0 text-muted">
                                                    Belum ada field surat.
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
                @if ($fieldSurat->hasPages())
                    <div class="card-footer">

                        {{ $fieldSurat->links() }}

                    </div>
                @endif

            </div>

        </div>

    </section>


    {{-- Form --}}
    {{-- <livewire:field-surat.form /> --}}

</div>
