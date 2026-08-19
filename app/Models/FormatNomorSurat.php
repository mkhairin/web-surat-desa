<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormatNomorSurat extends Model
{
    use HasFactory;

    protected $table = 'format_nomor_surat';

    protected $fillable = [
        'jenis_surat_id',
        'format',
        'current_number',
        'year',
        'is_active',
    ];

    protected $casts = [
        'current_number' => 'integer',
        'year' => 'integer',
        'is_active' => 'boolean'
    ];


    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
}
