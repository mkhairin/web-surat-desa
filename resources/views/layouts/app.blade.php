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
    function insertFormatPlaceholder(placeholder) {

        const input = document.getElementById('format');

        if (!input) {
            return;
        }

        const start = input.selectionStart;
        const end = input.selectionEnd;

        const value = input.value;

        input.value =
            value.substring(0, start) +
            placeholder +
            value.substring(end);

        const cursorPosition =
            start + placeholder.length;

        input.setSelectionRange(
            cursorPosition,
            cursorPosition
        );

        input.focus();

        input.dispatchEvent(
            new Event('input', {
                bubbles: true
            })
        );
    }

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


        // Field Surat
        Livewire.on('show-field-surat-modal', () => {
            $('#fieldSuratModal').modal('show');
        });

        Livewire.on('hide-field-surat-modal', () => {
            $('#fieldSuratModal').modal('hide');
        });

        // Format Nomor Surat
        Livewire.on('show-format-nomor-surat-modal', () => {
            $('#formatNomorSuratModal').modal('show');
        });

        Livewire.on('hide-format-nomor-surat-modal', () => {
            $('#formatNomorSuratModal').modal('hide');
        });
    });
</script>
