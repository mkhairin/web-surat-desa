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

    });
</script>
