@extends('adminlte::page')

@section('title', 'Dashboard Livewire')

@section('content_header')
    <h1>Dashboard Utama</h1>
@stop

@section('content')
    <!-- Memanggil komponen Livewire -->
    <livewire:contoh-komponen />
@stop

@section('css')
    <!-- Memuat style Livewire (Opsional untuk Livewire 3, tapi aman disertakan) -->
    @livewireStyles
@stop

@section('js')
    <!-- Memuat script Livewire -->
    @livewireScripts
@stop