<?php

namespace App\Livewire\FieldSurat;

use App\Models\FieldSurat as FieldSuratModel;
use App\Models\JenisSurat as JenisSuratModel;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Form extends Component
{
    public ?FieldSuratModel $fieldSurat = null;

    // #[Validate('required|exists:jenis_surat,id')]
    public string $jenis_surat_id = '';

    // #[Validate('required|string|max:100')]
    public string $field_name = '';

    // #[Validate('required|string|max:100')]
    public string $field_label = '';

    // #[Validate('required|in:text,textarea,number,select,date,checkbox,radio')]
    public string $field_type = 'text';

    public array $field_options = [];

    public bool $is_required = true;

    public bool $is_active = true;

    // #[Validate('required|integer|min:0')]
    public int $sort_order = 1;

    // Membuka form kosong untuk membuat field surat baru.
    #[On('open-field-surat-form')]
    public function create(): void
    {
        $this->resetForm();
        $this->fieldSurat = null;
        $this->dispatch('show-field-surat-modal');
    }

    // Membuka form dengan data field surat yang akan diedit.
    #[On('edit-field-surat')]
    public function edit(int $id): void
    {
        // Mengambil ID field surat dari event dan mencari datanya.
        $this->fieldSurat = FieldSuratModel::findOrFail($id);
        $this->fillForm();
        $this->dispatch('show-field-surat-modal');
    }

    // Memvalidasi dan menyimpan data field surat.
    public function save(): void
    {
        $rules = [
            'jenis_surat_id' => ['required', 'exists:jenis_surat,id'],
            'field_name' => [
                'required',
                'string',
                'regex:/^[a-z][a-z0-9_]*$/',
                Rule::unique('field_surat', 'field_name')->where(fn($query) => $query->where('jenis_surat_id', $this->jenis_surat_id)->ignore($this->fieldSurat?->id))
            ],
            'field_label' => [
                'required',
                'string',
                'max:100',
            ],

            'field_type' => [
                'required',
                'in:text,textarea,number,date,select,radio,checkbox',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],
        ];

        $validated = $this->validate($rules);
        // Field yang tidak membutuhkan options
        if (!in_array($this->field_type, [
            'select',
            'radio',
            'checkbox',
        ])) {
            $this->field_options = [];
        }

        // Bersihkan option kosong
        $this->field_options = array_values(
            array_filter(
                $this->field_options,
                fn($option) => trim($option) !== ''
            )
        );

        // Validasi options
        if (
            in_array($this->field_type, [
                'select',
                'radio',
                'checkbox',
            ])
            && empty($this->field_options)
        ) {
            $this->addError(
                'field_options',
                'Minimal harus memiliki satu pilihan.'
            );

            return;
        }
        // Menyiapkan data form untuk proses tambah atau ubah.
        $data = [
            'jenis_surat_id' => $this->jenis_surat_id,
            'field_name' => $this->field_name,
            'field_label' => $this->field_label,
            'field_type' => $this->field_type,
            'field_options' => $this->field_options,
            'is_required' => $this->is_required,
            'sort_order' => $this->sort_order
        ];

        if ($this->fieldSurat) {
            $this->fieldSurat->update($data);
            session()->flash('success', 'Field Surat updated successfully.');
        } else {
            FieldSuratModel::create($data);
            session()->flash('success', 'Field Surat created successfully.');
        }

        $this->dispatch('hide-field-surat-modal');
        $this->dispatch('field-surat-saved');
        $this->resetForm();
        session()->flash('success', $this->fieldSurat ? 'Field Surat updated successfully.' : 'Field Surat created successfully.');
    }

    // Menambahkan satu pilihan kosong ke daftar opsi field.
    public function addOption(): void
    {
        $this->field_options[] = '';
    }

    // Menghapus pilihan berdasarkan indeksnya dari daftar opsi.
    public function removeOption(int $index): void
    {
        unset($this->field_options[$index]);
        $this->field_options = array_values($this->field_options);
    }

    // Menyesuaikan opsi ketika tipe field mengalami perubahan.
    public function updatedFieldType(): void
    {
        if (!in_array($this->field_type, ['select', 'radio', 'checkbox'])) {
            $this->field_options = [];
        }

        $this->resetValidation('field_options');
    }

    // Menutup modal form dan mengembalikan kondisi awalnya.
    public function close(): void
    {
        $this->dispatch('hide-field-surat-modal');

        $this->resetForm();

        $this->fieldSurat = null;
    }

    // Mengisi properti form menggunakan data field surat yang dipilih.
    private function fillForm(): void
    {
        $this->jenis_surat_id = $this->fieldSurat->jenis_surat_id;
        $this->field_name = $this->fieldSurat->field_name;
        $this->field_label = $this->fieldSurat->field_label;
        $this->field_type = $this->fieldSurat->field_type;
        $this->field_options = $this->fieldSurat->field_options ?? [];
        $this->is_required = $this->fieldSurat->is_required;
        $this->is_active = $this->fieldSurat->is_active;
        $this->sort_order = $this->fieldSurat->sort_order;
    }

    // Mengembalikan seluruh properti form ke nilai awal.
    private function resetForm(): void
    {
        $this->reset([
            'jenis_surat_id',
            'field_name',
            'field_label',
            'field_options',
        ]);

        $this->field_type = 'text';
        $this->is_required = true;
        $this->is_active = true;
        $this->sort_order = 1;
        $this->resetValidation();
    }

    // Menampilkan form beserta daftar jenis surat yang masih aktif.
    public function render()
    {
        // Mengambil jenis surat aktif dan mengurutkannya berdasarkan nama.
        return view('livewire.field-surat.form', [
            'jenisSurat' => JenisSuratModel::where('is_active', true)->orderBy('nama_surat', 'asc')->get(),
        ]);
    }
}
