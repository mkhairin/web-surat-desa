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

@livewireScripts

<script>
    document.addEventListener('livewire:init', () => {

        Livewire.on('show-penduduk-modal', () => {
            $('#pendudukModal').modal('show');
        });

        Livewire.on('hide-penduduk-modal', () => {
            $('#pendudukModal').modal('hide');
        });

        Livewire.on('show-delete-penduduk-modal', () => {
            $('#deletePendudukModal').modal('show');
        });

        Livewire.on('hide-delete-penduduk-modal', () => {
            $('#deletePendudukModal').modal('hide');
        });


        // Jenis Surat
        Livewire.on('show-jenis-surat-modal', () => {
            $('#jenisSuratModal').modal('show');
        });

        Livewire.on('hide-jenis-surat-modal', () => {
            $('#jenisSuratModal').modal('hide');
        });

    });
</script>
