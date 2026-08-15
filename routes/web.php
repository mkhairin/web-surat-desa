<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Penduduk\Index as PendudukIndex;


Route::get('/', function () {
    return view('welcome');
});

// Route::livewire('/dashboard', 'contoh-komponen')->name('dashboard');
// Route::livewire('/dashboard/post', 'post')->name('dashboard.post');

Route::get('/penduduk', PendudukIndex::class)->name('penduduk.index');
