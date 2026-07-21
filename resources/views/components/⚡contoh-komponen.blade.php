<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

// Menentukan layout mana yang akan digunakan oleh full-page component ini
new class extends Component {
    public int $angka = 0;

    public function tambah()
    {
        $this->angka++;
    }

    public function kurang()
    {
        $this->angka--;
    }
};
?>

<div>
    <!-- Mengisi section spesifik milik AdminLTE dari dalam komponen -->
    @section('title', 'Dashboard Interaktif')

    @section('content_header')
        <h1>Dashboard Utama</h1>
    @stop

    <!-- Konten utama komponen Livewire -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Komponen Full-Page Livewire</h3>
        </div>
        <div class="card-body">
            <p>Klik saat ini: <strong>{{ $angka }}</strong></p>
            <button wire:click="tambah" class="btn btn-primary">
                Tambah Angka
            </button>
            <button wire:click="kurang" class ="btn btn-danger">Kurang Angka</button>
        </div>
    </div>
</div>
