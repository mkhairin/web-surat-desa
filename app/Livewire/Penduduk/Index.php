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

    public function updateSearch(): void
    {
        $this->resetPage();
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
