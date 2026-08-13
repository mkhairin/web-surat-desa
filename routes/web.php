<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/dashboard', 'contoh-komponen')->name('dashboard');
Route::livewire('/dashboard/post', 'post')->name('dashboard.post');