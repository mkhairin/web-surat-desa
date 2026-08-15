<?php

namespace App\Livewire\Penduduk;

use App\Models\Penduduk as PendudukModel;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $search='';

    

    public function render()
    {
        $penduduk = PendudukModel::all();
        return view('livewire.penduduk.index', ['penduduk' => $penduduk]);
    }
}
