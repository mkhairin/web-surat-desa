<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldSurat extends Model
{
    use HasFactory;

    protected $table = 'field_surat';

    protected $fillable = [
        'jenis_surat_id',
        'field_name',
        'field_label',
        'field_type',
        'field_options',
        'is_required',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'field_options' => 'array',
        'is_required' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
}
