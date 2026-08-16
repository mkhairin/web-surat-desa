<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penduduk';
    
    protected $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'pendidikan',
        'status_perkawinan',
        'kewarganegaraan',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_telp',
        'email'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class, 'penduduk_id');
    }
}
