@extends('adminlte::page')

@section('content')

    <!-- Livewire akan menyuntikkan komponennya ke dalam slot ini -->
    {{ $slot }}
@stop

@section('css')
    <!-- Memuat style Livewire (Opsional untuk Livewire 3, tapi aman disertakan) -->
    @livewireStyles
@stop

@section('js')
    <!-- Memuat script Livewire -->
    @livewireScripts
@stop
