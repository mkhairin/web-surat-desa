<div>
    <div wire:ignore.self class="modal fade" id="pendudukModal" tabindex="-1" role="dialog"
        aria-labelledby="pendudukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                {{-- Header --}}
                <div class="modal-header">

                    <h5 class="modal-title" id="pendudukModalLabel">
                        {{ $penduduk ? 'Edit Penduduk' : 'Tambah Penduduk' }}
                    </h5>

                    <button type="button" class="close" wire:click="$dispatch('hide-penduduk-modal')"
                        aria-label="Close">
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

                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                {{-- No KK --}}
                                <div class="form-group">

                                    <label for="nama_lengkap">
                                        Nama Lengkap
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="nama_lengkap" wire:model="nama_lengkap"
                                        class="form-control @error('nama_lengkap') is-invalid @enderror">

                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Tempat Lahir --}}
                                <div class="form-group">

                                    <label for="tempat_lahir">
                                        Tempat Lahir
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="tempat_lahir" wire:model="tempat_lahir"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror">

                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
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
                            </div>
                        </div>

                        <div class="row row-cols-4 g-4">
                            <div class="col">
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

                            <div class="col">
                                <div class="form-group">

                                    <label for="agama">
                                        Agama
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select id="agama" wire:model="agama"
                                        class="form-control @error('agama') is-invalid @enderror">
                                        <option value="">
                                            -- Pilih Agama --
                                        </option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghuchu">Konghuchu</option>
                                    </select>

                                    @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Pekerjaan --}}
                                <div class="form-group">

                                    <label for="pekerjaan">
                                        Pekerjaan
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="pekerjaan" wire:model="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror">

                                    @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Pendidikan --}}
                                <div class="form-group">

                                    <label for="pendidikan">
                                        Pendidikan
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="pendidikan" wire:model="pendidikan"
                                        class="form-control @error('pendidikan') is-invalid @enderror">

                                    @error('pendidikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                <div class="form-group">

                                    <label for="status_perkawinan">
                                        Status Perkawinan
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select id="status_perkawinan" wire:model="status_perkawinan"
                                        class="form-control @error('status_perkawinan') is-invalid @enderror">
                                        <option value="">
                                            -- Pilih Status Perkawinan --
                                        </option>
                                        <option value="belum_menikah">Belum Menikah</option>
                                        <option value="menikah">Menikah</option>
                                        <option value="cerai_hidup">Cerai Hidup</option>
                                        <option value="cerai_mati">Cerai Mati</option>
                                    </select>

                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">

                                    <label for="kewarganegaraan">
                                        Jenis Kewarganegaraan
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select id="kewarganegaraan" wire:model="kewarganegaraan"
                                        class="form-control @error('kewarganegaraan') is-invalid @enderror">
                                        <option value="">
                                            -- Pilih Jenis Kewarganegaraan --
                                        </option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>

                                    @error('kewarganegaraan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Alamat --}}
                                <div class="form-group">

                                    <label for="alamat">
                                        Alamat
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="alamat" wire:model="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror">

                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                {{-- RT --}}
                                <div class="form-group">

                                    <label for="rt">
                                        RT. (Rukun Tetangga)
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="rt" wire:model="rt"
                                        class="form-control @error('rt') is-invalid @enderror">

                                    @error('rt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col">
                                {{-- RT --}}
                                <div class="form-group">

                                    <label for="rw">
                                        RW. (Rukun Warga)
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="rw" wire:model="rw"
                                        class="form-control @error('rw') is-invalid @enderror">

                                    @error('rw')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col">
                                {{-- Desa --}}
                                <div class="form-group">

                                    <label for="desa">
                                        Desa
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="desa" wire:model="desa"
                                        class="form-control @error('desa') is-invalid @enderror">

                                    @error('desa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                {{-- Kecamatan --}}
                                <div class="form-group">

                                    <label for="kecamatan">
                                        Kecamatan
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="kecamatan" wire:model="kecamatan"
                                        class="form-control @error('kecamatan') is-invalid @enderror">

                                    @error('kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Kabupaten --}}
                                <div class="form-group">

                                    <label for="kabupaten">
                                        Kabupaten
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="kabupaten" wire:model="kabupaten"
                                        class="form-control @error('kabupaten') is-invalid @enderror">

                                    @error('kabupaten')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Porivinsi --}}
                                <div class="form-group">

                                    <label for="provinsi">
                                        Provinsi
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="provinsi" wire:model="provinsi"
                                        class="form-control @error('provinsi') is-invalid @enderror">

                                    @error('provinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="row row-cols-3 g-3">
                            <div class="col">
                                {{-- Kode POS --}}
                                <div class="form-group">

                                    <label for="kode_pos">
                                        Kode POS
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="kode_pos" wire:model="kode_pos"
                                        class="form-control @error('kode_pos') is-invalid @enderror">

                                    @error('kode_pos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- No Telp --}}
                                <div class="form-group">

                                    <label for="no_telp">
                                        No. Telepon
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="no_telp" wire:model="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror">

                                    @error('no_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="col">
                                {{-- Email --}}
                                <div class="form-group">

                                    <label for="email">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" id="email" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary"
                            wire:click="$dispatch('hide-penduduk-modal')">
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
