<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'nama_surat',
        'template',
        'version',
        'is_active'
    ];
}
