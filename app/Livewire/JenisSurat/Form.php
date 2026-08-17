<?php

namespace App\Livewire\JenisSurat;

use App\Models\JenisSurat as JenisSuratModel;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;

class Form extends Component
{
    public ?JenisSuratModel $jenisSurat = null;

    #[Validate('required|string|max:10')]
    public string $kode_surat = '';

    #[Validate('required|string|max:50')]
    public string $nama_surat = '';

    public ?string $deskripsi_surat = null;

    public bool $is_active = true;

    // Menampilkan Modal Create
    #[On('open-jenis-surat-form')]
    public function create(): void
    {
        $this->resetForm();

        $this->jenisSurat = null;
        $this->dispatch('show-jenis-surat-modal');
    }

    // Menampilkan Modal Edit
    #[On('edit-jenis-surat')]
    public function edit(int $id): void
    {
        $this->jenisSurat = JenisSuratModel::findOrFail($id);

        $this->fillForm();
        $this->dispatch('show-jenis-surat-modal');
    }

    // Menyimpan data
    public function save(): void
    {
        $validated = $this->validate();

        if ($this->jenisSurat) {
            $this->jenisSurat->update($validated);
            $message = 'Jenis surat berhasil diperbarui';
        } else {
            JenisSuratModel::create($validated);
            $message = 'Jenis surat berhasil ditambahkan';
        }

        $this->dispatch('hide-jenis-surat-modal');
        $this->dispatch('jenis-surat-saved');
        $this->resetForm();
        session()->flash('success', $message);
    }

    public function close(): void
    {
        $this->dispatch('hide-jenis-surat-modal');

        $this->resetForm();

        $this->jenisSurat = null;
    }

    private function fillForm(): void
    {
        $this->kode_surat = $this->jenisSurat->kode_surat;
        $this->nama_surat = $this->jenisSurat->nama_surat;
        $this->deskripsi_surat = $this->jenisSurat->deskripsi_surat;
        $this->is_active = $this->jenisSurat->is_active;
    }

    private function resetForm(): void
    {
        $this->reset([
            'kode_surat',
            'nama_surat',
            'deskripsi_surat',
        ]);

        $this->is_active = true;

        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.jenis-surat.form');
    }
}
