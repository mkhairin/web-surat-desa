<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormatNomorSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'format',
        'current_number'
    ];

    protected $casts = [
        'current_number' => 'integer',
        'year' => 'integer'
    ];


    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
}
