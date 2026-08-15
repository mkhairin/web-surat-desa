<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';

    protected $fillable = [
        'kode_surat',
        'nama_surat',
        'deskripsi_surat',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function fields()
    {
        return $this->hasMany(FieldSurat::class, 'jenis_surat_id');
    }

    public function templates()
    {
        return $this->hasMany(TemplateSurat::class, 'jenis_surat_id');
    }

    public function formatNomorSurat()
    {
        return $this->hasMany(FormatNomorSurat::class, 'jenis_surat_id');
    }

    public function surat()
    {
        return $this->hasMany(Surat::class, 'jenis_surat_id');
    }
}
