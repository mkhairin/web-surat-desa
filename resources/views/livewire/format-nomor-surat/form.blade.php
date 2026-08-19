<div>

    <div wire:ignore.self class="modal fade" id="formatNomorSuratModal" tabindex="-1" role="dialog"
        aria-labelledby="formatNomorSuratModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">

                    <h5 class="modal-title" id="formatNomorSuratModalLabel">
                        {{ $formatNomorSurat ? 'Edit Format Nomor Surat' : 'Tambah Format Nomor Surat' }}
                    </h5>

                    <button type="button" class="close" wire:click="close" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>

                </div>


                {{-- Form --}}
                <form wire:submit="save">

                    <div class="modal-body">

                        {{-- Jenis Surat --}}
                        <div class="form-group">

                            <label for="jenis_surat_id">
                                Jenis Surat
                                <span class="text-danger">*</span>
                            </label>

                            <select id="jenis_surat_id" wire:model="jenis_surat_id"
                                class="form-control @error('jenis_surat_id') is-invalid @enderror">

                                <option value="">
                                    -- Pilih Jenis Surat --
                                </option>

                                @foreach ($jenisSurat as $jenis)
                                    <option value="{{ $jenis->id }}">
                                        {{ $jenis->kode_surat }}
                                        -
                                        {{ $jenis->nama_surat }}
                                    </option>
                                @endforeach

                            </select>

                            @error('jenis_surat_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Tahun --}}
                        <div class="form-group">

                            <label for="year">
                                Tahun
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number" id="year" wire:model="year" min="2000" max="2100"
                                class="form-control @error('year') is-invalid @enderror">

                            @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Format --}}
                        <div class="form-group">

                            <label for="format">
                                Format Nomor
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" id="format" wire:model.live="format"
                                class="form-control @error('format') is-invalid @enderror"
                                placeholder="{nomor}/{kode_surat}/{bulan_romawi}/{tahun}">

                            @error('format')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="button" class="btn btn-sm btn-outline-primary mr-2 mb-2"
                                onclick="insertFormatPlaceholder('{nomor}')">
                                <i class="fas fa-plus mr-1"></i>
                                Nomor
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary mr-2 mb-2"
                                onclick="insertFormatPlaceholder('{kode_surat}')">
                                <i class="fas fa-plus mr-1"></i>
                                Kode Surat
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary mr-2 mb-2"
                                onclick="insertFormatPlaceholder('{bulan}')">
                                <i class="fas fa-plus mr-1"></i>
                                Bulan
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary mr-2 mb-2"
                                onclick="insertFormatPlaceholder('{bulan_romawi}')">
                                <i class="fas fa-plus mr-1"></i>
                                Bulan Romawi
                            </button>

                            <button type="button" class="btn btn-sm btn-outline-primary mr-2 mb-2"
                                onclick="insertFormatPlaceholder('{tahun}')">
                                <i class="fas fa-plus mr-1"></i>
                                Tahun
                            </button>

                        </div>


                        {{-- Available Tokens --}}
                        <div class="alert alert-info">

                            <strong>
                                Placeholder yang tersedia:
                            </strong>

                            <div class="mt-2">

                                <code>{nomor}</code>

                                <span class="mx-1">
                                    Nomor urut
                                </span>

                                <br>

                                <code>{kode_surat}</code>

                                <span class="mx-1">
                                    Kode jenis surat
                                </span>

                                <br>

                                <code>{bulan}</code>

                                <span class="mx-1">
                                    Bulan angka
                                </span>

                                <br>

                                <code>{bulan_romawi}</code>

                                <span class="mx-1">
                                    Bulan Romawi
                                </span>

                                <br>

                                <code>{tahun}</code>

                                <span class="mx-1">
                                    Tahun
                                </span>

                            </div>

                        </div>


                        {{-- Current Number --}}
                        <div class="form-group">

                            <label for="current_number">
                                Nomor Terakhir
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number" id="current_number" wire:model="current_number" min="0"
                                class="form-control @error('current_number') is-invalid @enderror">

                            <small class="form-text text-muted">
                                Nomor berikutnya akan menggunakan nomor
                                {{ $current_number + 1 }}.
                            </small>

                            @error('current_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Status --}}
                        @if ($formatNomorSurat)

                            <div class="form-group">

                                <label>
                                    Status
                                </label>

                                <div>

                                    @if ($is_active)
                                        <span class="badge badge-success">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            Tidak Aktif
                                        </span>
                                    @endif

                                </div>

                            </div>

                        @endif


                        {{-- Preview --}}
                        <div class="card bg-light">

                            <div class="card-header">

                                <strong>
                                    <i class="fas fa-eye mr-1"></i>
                                    Preview
                                </strong>

                            </div>

                            <div class="card-body">

                                @php

                                    $preview = $format;

                                    $preview = str_replace(
                                        '{nomor}',
                                        str_pad($current_number + 1, 3, '0', STR_PAD_LEFT),
                                        $preview,
                                    );

                                    $preview = str_replace(
                                        '{kode_surat}',
                                        $jenisSurat->firstWhere('id', $jenis_surat_id)?->kode_surat ?? 'KODE',
                                        $preview,
                                    );

                                    $preview = str_replace('{bulan}', now()->format('m'), $preview);

                                    $preview = str_replace(
                                        '{bulan_romawi}',
                                        match (now()->month) {
                                            1 => 'I',
                                            2 => 'II',
                                            3 => 'III',
                                            4 => 'IV',
                                            5 => 'V',
                                            6 => 'VI',
                                            7 => 'VII',
                                            8 => 'VIII',
                                            9 => 'IX',
                                            10 => 'X',
                                            11 => 'XI',
                                            12 => 'XII',
                                        },
                                        $preview,
                                    );

                                    $preview = str_replace('{tahun}', $year, $preview);

                                @endphp

                                <code class="h5">
                                    {{ $preview ?: 'Preview nomor surat' }}
                                </code>

                            </div>

                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" wire:click="close">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">

                            <span wire:loading.remove wire:target="save">
                                <i class="fas fa-save mr-1"></i>
                                Simpan
                            </span>

                            <span wire:loading wire:target="save">
                                <i class="fas fa-spinner fa-spin mr-1"></i>
                                Menyimpan...
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function insertFormatPlaceholder(placeholder) {

        const input = document.getElementById('format');

        if (!input) {
            return;
        }

        const start = input.selectionStart;
        const end = input.selectionEnd;

        const value = input.value;

        let separator = '';

        if (value.length > 0 && !value.endsWith('/')) {
            separator = '/';
        }

        const insertedText = separator + placeholder;

        input.value =
            value.substring(0, start) +
            insertedText +
            value.substring(end);

        const cursorPosition =
            start + insertedText.length;

        input.setSelectionRange(
            cursorPosition,
            cursorPosition
        );

        input.focus();

        input.dispatchEvent(
            new Event('input', {
                bubbles: true
            })
        );
    }
</script>
