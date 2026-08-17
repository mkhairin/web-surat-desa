<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Penduduk\Index as PendudukIndex;
use App\Livewire\Penduduk\Form as PendudukForm;
use App\Livewire\Penduduk\Show as PendudukShow;
use App\Livewire\JenisSurat\Index as JenisSuratIndex;
use App\Livewire\JenisSurat\Form as JenisSuratForm;

Route::get('/', function () {
    return view('welcome');
});

// Route::livewire('/dashboard', 'contoh-komponen')->name('dashboard');
// Route::livewire('/dashboard/post', 'post')->name('dashboard.post');

Route::get('/penduduk', PendudukIndex::class)->name('penduduk.index');
Route::get('/penduduk/create', PendudukForm::class)->name('penduduk.create');
Route::get('/penduduk/{penduduk}', PendudukShow::class)->name('penduduk.show');
Route::get('/penduduk/{penduduk}/edit', PendudukForm::class)->name('penduduk.edit');

Route::get('/jenis-surat', JenisSuratIndex::class)->name('jenis-surat.index');
Route::get('/jenis-surat/{jenis-surat}/edit', JenisSuratForm::class)->name('jenis-surat.edit');
