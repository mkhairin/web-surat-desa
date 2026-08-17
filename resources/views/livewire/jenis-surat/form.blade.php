<div>

    <div
        wire:ignore.self
        class="modal fade"
        id="jenisSuratModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="jenisSuratModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="jenisSuratModalLabel"
                    >
                        {{ $jenisSurat ? 'Edit Jenis Surat' : 'Tambah Jenis Surat' }}
                    </h5>

                    <button
                        type="button"
                        class="close"
                        wire:click="close"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>

                </div>


                {{-- Form --}}
                <form wire:submit="save">

                    <div class="modal-body">

                        {{-- Kode Surat --}}
                        <div class="form-group">

                            <label for="kode_surat">
                                Kode Surat
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="kode_surat"
                                wire:model="kode_surat"
                                class="form-control @error('kode_surat') is-invalid @enderror"
                                maxlength="10"
                                placeholder="Contoh: SKTM"
                            >

                            @error('kode_surat')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Nama Surat --}}
                        <div class="form-group">

                            <label for="nama_surat">
                                Nama Surat
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                id="nama_surat"
                                wire:model="nama_surat"
                                class="form-control @error('nama_surat') is-invalid @enderror"
                                maxlength="50"
                                placeholder="Contoh: Surat Keterangan Tidak Mampu"
                            >

                            @error('nama_surat')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Deskripsi --}}
                        <div class="form-group">

                            <label for="deskripsi_surat">
                                Deskripsi
                            </label>

                            <textarea
                                id="deskripsi_surat"
                                wire:model="deskripsi_surat"
                                class="form-control @error('deskripsi_surat') is-invalid @enderror"
                                rows="4"
                                placeholder="Masukkan deskripsi jenis surat..."
                            ></textarea>

                            @error('deskripsi_surat')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Status --}}
                        @if ($jenisSurat)

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

                        <button
                            type="button"
                            class="btn btn-secondary"
                            wire:click="close"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            class="btn btn-primary"
                            wire:loading.attr="disabled"
                            wire:target="save"
                        >

                            <span
                                wire:loading.remove
                                wire:target="save"
                            >
                                <i class="fas fa-save mr-1"></i>
                                Simpan
                            </span>

                            <span
                                wire:loading
                                wire:target="save"
                            >
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