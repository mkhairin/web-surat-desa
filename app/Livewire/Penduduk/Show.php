<?php

namespace App\Livewire\Penduduk;

use App\Models\Penduduk as PendudukModel;
use Livewire\Component;

class Show extends Component
{
    public PendudukModel $penduduk;

    public function mount(PendudukModel $penduduk): void
    {
        $this->penduduk = $penduduk;
    }

    public function render()
    {
        return view('livewire.penduduk.show');
    }
}
