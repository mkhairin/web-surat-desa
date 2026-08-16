<?php

namespace App\Livewire\Penduduk;

use App\Models\Penduduk as PendudukModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Url]
    public string $search = '';

    public ?PendudukModel $pendudukToDelete = null;

    public bool $showDeleteModal = false;

    public function updateSearch(): void
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        $this->pendudukToDelete = PendudukModel::findOrFail($id);

        $this->showDeleteModal = true;
        $this->dispatch('show-delete-penduduk-modal');
    }

    public function cancelDelete(): void
    {
        $this->pendudukToDelete = null;
        $this->showDeleteModal = false;
        $this->dispatch('hide-delete-penduduk-modal');
    }

    public function delete(): void
    {
        if (!$this->pendudukToDelete) {
            return;
        }
        $nama = $this->pendudukToDelete->nama_lengkap;

        $this->pendudukToDelete->delete();

        $this->pendudukToDelete = null;

        $this->showDeleteModal = false;

        $this->dispatch('hide-delete-penduduk-modal');

        session()->flash(
            'success',
            "Data penduduk {$nama} berhasil dihapus."
        );
    }

    public function render()
    {
        $penduduk = PendudukModel::query()->when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('nik', 'like', '%' . $this->search . '%')
                    ->orWhere('no_kk', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_lengkap', 'like', '%' . $this->search . '%');
            });
        })->orderBy('nama_lengkap')->simplePaginate(7);

        return view('livewire.penduduk.index', ['penduduk' => $penduduk]);
    }
}
