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
}
