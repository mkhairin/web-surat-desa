<div>

    <div wire:ignore.self class="modal fade" id="fieldSuratModal" tabindex="-1" role="dialog"
        aria-labelledby="fieldSuratModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">

                    <h5 class="modal-title" id="fieldSuratModalLabel">
                        {{ $fieldSurat ? 'Edit Field Surat' : 'Tambah Field Surat' }}
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


                        {{-- Field Name --}}
                        <div class="form-group">

                            <label for="field_name">
                                Nama Field
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" id="field_name" wire:model="field_name"
                                class="form-control @error('field_name') is-invalid @enderror" maxlength="100"
                                placeholder="Contoh: nama_usaha">

                            <small class="form-text text-muted">
                                Gunakan nama tanpa spasi, misalnya
                                <code>nama_usaha</code>.
                            </small>

                            @error('field_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Field Label --}}
                        <div class="form-group">

                            <label for="field_label">
                                Label Field
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" id="field_label" wire:model="field_label"
                                class="form-control @error('field_label') is-invalid @enderror" maxlength="100"
                                placeholder="Contoh: Nama Usaha">

                            @error('field_label')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Field Type --}}
                        <div class="form-group">

                            <label for="field_type">
                                Tipe Field
                                <span class="text-danger">*</span>
                            </label>

                            <select id="field_type" wire:model.live="field_type"
                                class="form-control @error('field_type') is-invalid @enderror">

                                <option value="text">
                                    Text
                                </option>

                                <option value="textarea">
                                    Textarea
                                </option>

                                <option value="number">
                                    Number
                                </option>

                                <option value="date">
                                    Date
                                </option>

                                <option value="select">
                                    Select
                                </option>

                                <option value="radio">
                                    Radio
                                </option>

                                <option value="checkbox">
                                    Checkbox
                                </option>

                            </select>

                            @error('field_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Field Options --}}
                        @if (in_array($field_type, ['select', 'radio', 'checkbox']))

                            <div class="form-group">

                                <label>
                                    Pilihan
                                    <span class="text-danger">*</span>
                                </label>

                                @foreach ($field_options as $index => $option)
                                    <div class="input-group mb-2">

                                        <input type="text" wire:model="field_options.{{ $index }}"
                                            class="form-control" placeholder="Masukkan pilihan...">

                                        <div class="input-group-append">

                                            <button type="button" class="btn btn-danger"
                                                wire:click="removeOption({{ $index }})" title="Hapus pilihan">
                                                <i class="fas fa-times"></i>
                                            </button>

                                        </div>

                                    </div>
                                @endforeach


                                <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addOption">
                                    <i class="fas fa-plus mr-1"></i>
                                    Tambah Pilihan
                                </button>


                                @error('field_options')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        @endif


                        {{-- Sort Order --}}
                        <div class="form-group">

                            <label for="sort_order">
                                Urutan
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number" id="sort_order" wire:model="sort_order" min="0"
                                class="form-control @error('sort_order') is-invalid @enderror">

                            <small class="form-text text-muted">
                                Menentukan urutan field saat ditampilkan.
                            </small>

                            @error('sort_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Required --}}
                        <div class="form-group">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" class="custom-control-input" id="is_required"
                                    wire:model="is_required">

                                <label class="custom-control-label" for="is_required">
                                    Field wajib diisi
                                </label>

                            </div>

                        </div>


                        {{-- Status --}}
                        @if ($fieldSurat)

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

                    </div>


                    {{-- Footer --}}
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" wire:click="close">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                            wire:target="save">

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
