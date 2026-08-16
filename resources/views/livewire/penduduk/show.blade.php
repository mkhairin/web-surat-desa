<div>
    {{-- Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <i class="fas fa-user-circle mr-2 text-primary"></i>Detail Penduduk
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('penduduk.index') }}">Penduduk</a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">

            {{-- Action Toolbar --}}
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('penduduk.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="button" class="btn btn-warning shadow-sm text-dark font-weight-bold"
                    wire:click="$dispatch('edit-penduduk', { id: {{ $penduduk->id }} })">
                    <i class="fas fa-edit mr-1"></i> Edit Data
                </button>
            </div>

            {{-- Row 1: Identitas --}}
            <div class="card  card-outline shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-id-card text-primary mr-2"></i> Data Identitas Diri
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row pb-3 mb-3 border-bottom">
                        <div class="col-12 text-center text-md-left col-md-12">
                            <h4 class="mb-0 font-weight-bold">{{ $penduduk->nama_lengkap }}</h4>
                            <span class="badge badge-primary">NIK: {{ $penduduk->nik }}</span>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Identitas Kolom 1 --}}
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40%" class="text-muted font-weight-normal">No. Kartu Keluarga</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->no_kk }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Jenis Kelamin</th>
                                    <td><span class="font-weight-bold">{{ ucfirst($penduduk->jenis_kelamin) }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Agama</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->agama }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Status Perkawinan</th>
                                    <td><span
                                            class="font-weight-bold">{{ str_replace('_', ' ', ucfirst($penduduk->status_perkawinan)) }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- Identitas Kolom 2 --}}
                        <div class="col-md-6">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="40%" class="text-muted font-weight-normal">Tempat Lahir</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->tempat_lahir }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Tanggal Lahir</th>
                                    <td><span
                                            class="font-weight-bold">{{ $penduduk->tanggal_lahir?->format('d F Y') ?? '-' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Kewarganegaraan</th>
                                    <td><span class="font-weight-bold">{{ ucfirst($penduduk->kewarganegaraan) }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Row 2: Alamat & Info Tambahan --}}
            <div class="row">

                {{-- Kolom Kiri: Alamat --}}
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-white">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i> Detail Alamat
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th width="35%" class="text-muted font-weight-normal">Jalan/Dusun</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->alamat }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">RT / RW</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->rt }} /
                                            {{ $penduduk->rw }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Desa/Kelurahan</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->desa }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Kecamatan</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->kecamatan }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Kabupaten/Kota</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->kabupaten }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Provinsi</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->provinsi }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Kode Pos</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->kode_pos }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Pendidikan, Pekerjaan & Kontak --}}
                <div class="col-md-6 mb-4">

                    {{-- Pendidikan & Pekerjaan --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-briefcase text-success mr-2"></i> Pendidikan & Pekerjaan
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <th width="35%" class="text-muted font-weight-normal">Pendidikan</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->pendidikan }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Pekerjaan</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->pekerjaan }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Kontak --}}
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-white">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-address-book text-info mr-2"></i> Informasi Kontak
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <th width="35%" class="text-muted font-weight-normal">No. Telepon</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->no_telp ?? '-' }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted font-weight-normal">Email</th>
                                    <td><span class="font-weight-bold">{{ $penduduk->email ?? '-' }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
