<?php

namespace App\Livewire\FormatNomorSurat;

use Livewire\Component;
use App\Models\FormatNomorSurat as FormatNomorSuratModel;
use App\Models\JenisSurat as JenisSuratModel;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public string $jenisSuratId = '';

    public string $year = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingJenisSuratId(): void
    {
        $this->resetPage();
    }

    public function updatingYear(): void
    {
        $this->resetPage();
    }

    public function toggleStatus(int $id): void
    {
        $formatNomorSurat = FormatNomorSuratModel::findOrFail($id);

        $formatNomorSurat->update([
            'is_active' => !$formatNomorSurat->is_active
        ]);

        session()->flash(
            'success',
            $formatNomorSurat->is_active ? 'Format nomor surat berhasil diaktifkan.'
                : 'Format nomor surat berhasil dinonaktifkan.'
        );
    }

    public function render()
    {
        $jenisSurat = JenisSuratModel::query()->orderBy('nama_surat')->get();

        $years = FormatNomorSuratModel::query()->select('year')->distinct()->orderByDesc('year')->pluck('year');

        $formatNomorSurat = FormatNomorSuratModel::query()->with('jenisSurat')->when($this->search, function ($query) {
            $query->where('format', 'like', '%' . $this->search . '%');
        })->when($this->jenisSuratId, function ($query) {
            $query->where('jenis_surat_id', $this->jenisSuratId);
        })->when($this->year, function ($query) {
            $query->where('year', $this->year);
        })->orderByDesc('year')->orderBy('jenis_surat_id')->simplePaginate(10);

        return view('livewire.format-nomor-surat.index', [
            'jenisSurat' => $jenisSurat,
            'years' => $years,
            'formatNomorSurat' => $formatNomorSurat,
        ]);
    }
}
