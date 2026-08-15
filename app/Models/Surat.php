<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'penduduk_id',
        'jenis_surat_id',
        'template_surat_id',
        'nomor_surat',
        'status',
        'tanggal_terbit',
        'dibuat_oleh',
        'disetujui_oleh',
        'data_surat',
        'file_pdf',
        'catatan'
    ];

    protected $casts = [
        'data_surat' => 'array',
        'tanggal_terbit' => 'date'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function templateSurat()
    {
        return $this->belongsTo(TemplateSurat::class, 'template_surat_id');
    }

    public function dibuatOleh()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function disetujuiOleh()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}
