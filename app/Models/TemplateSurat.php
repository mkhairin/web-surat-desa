<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'nama_template',
        'template',
        'version',
        'is_active'
    ];

    protected $casts = [
        'version' => 'integer',
        'is_active' => 'boolean'
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function surat()
    {
        return $this->hasMany(Surat::class, 'jenis_surat_id');
    }
}
