<?php

namespace App\Livewire\FormatNomorSurat;

use Livewire\Component;
use App\Models\FormatNomorSurat as FormatNomorSuratModel;
use App\Models\JenisSurat as JenisSuratModel;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class Form extends Component
{
    public ?FormatNomorSuratModel $formatNomorSurat = null;

    public string $jenis_surat_id = '';

    public string $format = '';

    public int $current_number = 0;

    public int $year;

    public bool $is_active = true;

    public function mount(): void
    {
        $this->year = now()->year;
    }

    #[On('open-format-nomor-surat-form')]
    public function create(): void
    {
        $this->resetForm();

        $this->formatNomorSurat = null;

        $this->dispatch('show-format-nomor-surat-modal');
    }

    #[On('edit-format-nomor-surat')]
    public function edit(int $id): void
    {
        $this->formatNomorSurat =
            FormatNomorSuratModel::findOrFail($id);

        $this->fillForm();

        $this->dispatch('show-format-nomor-surat-modal');
    }

    // public function addPlaceholder(string $placeholder): void
    // {
    //     if ($this->format !== '') {
    //         $this->format .= '/';
    //     }
    //     $this->format .= $placeholder;
    // }

    public function save(): void
    {
        // $rules = [
        //     'jenis_surat_id' => ['required', 'exists:jenis_surat,id'],
        //     'format' => ['required', 'string', 'max:100'],
        //     'current_number' => ['required', 'integer', 'min:0'],
        //     'years' => ['required', 'integer', 'min:2000', 'max:2100', Rule::unique('format_nomor_surat', 'year')->where(fn($query) => $query->where('jenis_surat_id', $this->jenis_surat_id))->ignore($this->formatNomorSurat?->id)],

        // ];

        $validated = $this->validate([
            'jenis_surat_id' => [
                'required',
                'exists:jenis_surat,id',
            ],

            'format' => [
                'required',
                'string',
                'max:255',
            ],

            'current_number' => [
                'required',
                'integer',
                'min:0',
            ],

            'year' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',

                Rule::unique('format_nomor_surat', 'year')
                    ->where(
                        fn($query) =>
                        $query->where(
                            'jenis_surat_id',
                            $this->jenis_surat_id
                        )
                    )
                    ->ignore(
                        $this->formatNomorSurat?->id
                    ),
            ],
        ]);

        // $data = [
        //     'jenis_surat_id' => $rules['jenis_surat_id'],
        //     'format' => $rules['format'],
        //     'current_number' => $rules['current_number'],
        //     'year' => $rules['year'],
        // ];

        $data = [
            'jenis_surat_id' => $validated['jenis_surat_id'],
            'format' => $validated['format'],
            'current_number' => $validated['current_number'],
            'year' => $validated['year'],
        ];

        if ($this->formatNomorSurat) {
            $this->formatNomorSurat->update($data);
            $message = 'Format nomor surat berhasil diperbarui.';
        } else {
            FormatNomorSuratModel::create($data);
            $message = 'Format nomor surat berhasil ditambahkan.';
        }

        $this->dispatch('hide-format-nomor-surat-modal');
        $this->dispatch('format-nomor-surat-saved');

        $this->resetForm();

        session()->flash(
            'success',
            $message
        );
    }

    private function fillForm(): void
    {
        $this->jenis_surat_id = (string) $this->formatNomorSurat->jenis_surat_id;
        $this->format = $this->formatNomorSurat->format;
        $this->current_number = $this->formatNomorSurat->current_number;
        $this->year = $this->formatNomorSurat->year;
        $this->is_active = $this->formatNomorSurat->is_active;
    }

    private function resetForm(): void
    {
        $this->reset([
            'jenis_surat_id',
            'format'
        ]);

        $this->current_number = 0;
        $this->year = now()->year;
        $this->is_active = true;
        $this->resetValidation();
    }

    public function close(): void
    {
        $this->dispatch(
            'hide-format-nomor-surat-modal'
        );

        $this->resetForm();

        $this->formatNomorSurat = null;
    }

    public function render()
    {
        $jenisSurat = JenisSuratModel::query()->where('is_active', true)->orderBy('nama_surat')->get();

        return view('livewire.format-nomor-surat.form', [
            'jenisSurat' => $jenisSurat,
        ]);
    }
}
