<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'field_name',
        'field_label',
        'field_type',
        'is_required',
        'sort_order'
    ];
}
