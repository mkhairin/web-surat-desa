<?php

namespace App\Livewire\JenisSurat;

use App\Models\JenisSurat as JenisSuratModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public ?JenisSuratModel $jenisSurat = null;

    #[Url]
    public string $search = '';

    public bool $is_active = true;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function toggleStatus(int $id): void
    {
        $jenisSurat = JenisSuratModel::findOrFail($id);

        if (!$this->jenisSurat) {
            return;
        }

        $this->jenisSurat->update([
            'is_active' => !$this->jenisSurat->is_active,
        ]);

        dd($this->jenisSurat->is_active);

        $this->jenisSurat->refresh();

        $this->is_active = $this->jenisSurat->is_active;

        $this->dispatch('jenis-surat-saved');

        session()->flash(
            'success',
            $this->jenisSurat->is_active
                ? 'Jenis surat berhasil diaktifkan.'
                : 'Jenis surat berhasil dinonaktifkan.'
        );
    }

    public function render()
    {
        $dataJenisSurat = JenisSuratModel::query()->when($this->search, function ($query) {
            $query->where('kode_surat', 'like', '%' . $this->search . '%')->orWhere('nama_surat', 'like', '%' . $this->search . '%');
        })->orderBy('nama_surat')->simplePaginate(5);



        return view('livewire.jenis-surat.index', [
            'dataJenisSurat' => $dataJenisSurat
        ]);
    }
}
