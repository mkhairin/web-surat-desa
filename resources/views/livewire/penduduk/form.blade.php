@teleport('body')
    <div wire:ignore.self class="modal fade" id="pendudukModal" tabindex="-1" role="dialog"
        aria-labelledby="pendudukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">

                    <h5 class="modal-title" id="pendudukModalLabel">
                        {{ $penduduk ? 'Edit Penduduk' : 'Tambah Penduduk' }}
                    </h5>

                    <button type="button" class="close" wire:click="$dispatch('hide-penduduk-modal')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                {{-- Form --}}
                <form wire:submit="save">

                    <div class="modal-body">
                        <div class="row row-cols-2 g-2">
                            {{-- NIK --}}
                            <div class="col">
                                <div class="form-group">

                                    <label for="nik">
                                        NIK (Nomor Induk Kependudukan)
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="nik" wire:model="nik"
                                        class="form-control @error('nik') is-invalid @enderror">

                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- No KK --}}
                                <div class="form-group">

                                    <label for="no_kk">
                                        No KK (Kartu Keluarga)
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="no_kk" wire:model="no_kk"
                                        class="form-control @error('no_kk') is-invalid @enderror">

                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-2 g-2">
                            <div class="col">
                                {{-- No KK --}}
                                <div class="form-group">

                                    <label for="no_kk">
                                        Nama Lengkap
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="no_kk" wire:model="no_kk"
                                        class="form-control @error('no_kk') is-invalid @enderror">

                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- No KK --}}
                                <div class="form-group">

                                    <label for="no_kk">
                                        Tempat Lahir
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="no_kk" wire:model="no_kk"
                                        class="form-control @error('no_kk') is-invalid @enderror">

                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group">

                            <label for="tanggal_lahir">
                                Tanggal Lahir
                                <span class="text-danger">*</span>
                            </label>

                            <input type="date" id="tanggal_lahir" wire:model="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror">

                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group">

                            <label for="jenis_kelamin">
                                Jenis Kelamin
                                <span class="text-danger">*</span>
                            </label>

                            <select id="jenis_kelamin" wire:model="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">
                                    -- Pilih Jenis Kelamin --
                                </option>

                                <option value="laki-laki">
                                    Laki-laki
                                </option>

                                <option value="perempuan">
                                    Perempuan
                                </option>
                            </select>

                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" wire:click="$dispatch('hide-penduduk-modal')">
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
@endteleport
