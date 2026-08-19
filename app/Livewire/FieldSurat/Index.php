<?php

namespace App\Livewire\FieldSurat;

use App\Models\FieldSurat as FieldSuratModel;
use App\Models\JenisSurat as JenisSuratModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $jenisSuratId = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingJenisSuratId(): void
    {
        $this->resetPage();
    }

    public function toggleStatus(int $id): void
    {

        $fieldSurat = FieldSuratModel::findOrFail($id);
        $fieldSurat->update([
            'is_active' => !$fieldSurat->is_active
        ]);

        session()->flash(
            'success',
            $fieldSurat->is_active
                ? 'Field surat berhasil diaktifkan.'
                : 'Field surat berhasil dinonaktifkan.'
        );
    }

    public function render()
    {
        $jenisSurat = JenisSuratModel::where('is_active', true)->orderBy('nama_surat', 'asc')->get();

        $fieldSurat = FieldSuratModel::query()->with('jenisSurat')->when($this->search, function ($query) {
            $query->where('field_name', 'like', '%' . $this->search . '%')
                ->orWhere('field_label', 'like', '%' . $this->search . '%');
        })->when($this->jenisSuratId, function ($query) {
            $query->where('jenis_surat_id', $this->jenisSuratId);
        })->orderBy('sort_order', 'asc')->simplePaginate(5);

        return view('livewire.field-surat.index', [
            'fieldSurat' => $fieldSurat,
            'jenisSurat' => $jenisSurat,
        ]);
    }
}
