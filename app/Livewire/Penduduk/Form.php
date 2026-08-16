<?php

namespace App\Livewire\Penduduk;

use App\Models\Penduduk;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Form extends Component
{
    public ?Penduduk $penduduk = null;

    #[Validate('required|digits:16')]
    public string $nik = '';

    #[Validate('required|digits:16')]
    public string $no_kk = '';

    #[Validate('required|string|max:100')]
    public string $nama_lengkap = '';

    #[Validate('required|string|max:100')]
    public string $tempat_lahir = '';

    #[Validate('required|date')]
    public string $tanggal_lahir = '';

    #[Validate('required|in:laki-laki,perempuan')]
    public string $jenis_kelamin = '';

    #[Validate('required|string|max:30')]
    public string $agama = '';

    #[Validate('required|string|max:100')]
    public string $pekerjaan = '';

    #[Validate('required|string|max:20')]
    public string $pendidikan = '';

    #[Validate('required|in:belum_menikah,menikah,cerai_hidup,cerai_mati')]
    public string $status_perkawinan = '';

    #[Validate('required|in:WNI,WNA')]
    public string $kewarganegaraan = '';

    #[Validate('required|string|max:100')]
    public string $alamat = '';

    #[Validate('required|string|max:3')]
    public string $rt = '';

    #[Validate('required|string|max:3')]
    public string $rw = '';

    #[Validate('required|string|max:100')]
    public string $desa = '';

    #[Validate('required|string|max:100')]
    public string $kecamatan = '';

    #[Validate('required|string|max:100')]
    public string $kabupaten = '';

    #[Validate('required|string|max:100')]
    public string $provinsi = '';

    #[Validate('required|string|max:5')]
    public string $kode_pos = '';

    #[Validate('required|string|max:20')]
    public string $no_telp = '';

    public string $email = '';

    #[On('open-penduduk-form')]
    public function create(): void
    {
        $this->resetForm();

        $this->penduduk = null;
        $this->dispatch('show-penduduk-modal');
    }

    #[On('edit-penduduk')]
    public function edit(int $id): void
    {
        $this->penduduk = Penduduk::findOrFail($id);

        $this->fillForm();

        $this->dispatch('show-penduduk-modal');
    }

    public function save(): void
    {
        dd('SAVE BERHASIL DIPANGGIL');
        $validated = $this->validate();

        if ($this->penduduk) {
            $this->penduduk->update($validated);

            $message = 'Data penduduk berhasil diperbarui.';
        } else {
            Penduduk::create($validated);

            $message = 'Data penduduk berhasil ditambahkan.';
        }

        $this->dispatch('hide-penduduk-modal');

        $this->dispatch('penduduk-saved');

        session()->flash('success', $message);
    }

    public function close(): void
    {
        $this->dispatch('hide-penduduk-modal');
        $this->resetForm();

        $this->resetValidation();

        $this->penduduk = null;
    }

    private function fillForm(): void
    {
        $this->nik = $this->penduduk->nik;
        $this->no_kk = $this->penduduk->no_kk;
        $this->nama_lengkap = $this->penduduk->nama_lengkap;
        $this->tempat_lahir = $this->penduduk->tempat_lahir;
        $this->tanggal_lahir = $this->penduduk->tanggal_lahir?->format('Y-m-d');
        $this->jenis_kelamin = $this->penduduk->jenis_kelamin;
        $this->agama = $this->penduduk->agama;
        $this->pekerjaan = $this->penduduk->pekerjaan;
        $this->pendidikan = $this->penduduk->pendidikan;
        $this->status_perkawinan = $this->penduduk->status_perkawinan;
        $this->kewarganegaraan = $this->penduduk->kewarganegaraan;
        $this->alamat = $this->penduduk->alamat;
        $this->rt = $this->penduduk->rt;
        $this->rw = $this->penduduk->rw;
        $this->desa = $this->penduduk->desa;
        $this->kecamatan = $this->penduduk->kecamatan;
        $this->kabupaten = $this->penduduk->kabupaten;
        $this->provinsi = $this->penduduk->provinsi;
        $this->kode_pos = $this->penduduk->kode_pos;
        $this->no_telp = $this->penduduk->no_telp;
        $this->email = $this->penduduk->email;
    }

    private function resetForm(): void
    {
        $this->reset([
            'nik',
            'no_kk',
            'nama_lengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'pekerjaan',
            'pendidikan',
            'status_perkawinan',
            'kewarganegaraan',
            'alamat',
            'rt',
            'rw',
            'desa',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kode_pos',
            'no_telp',
            'email'
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.penduduk.form');
    }
}
