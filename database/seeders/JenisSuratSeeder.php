<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisSurat as JenisSuratModel;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurat = [
            [
                'kode_surat' => 'SKTM',
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan bahwa penduduk termasuk dalam kategori keluarga tidak mampu.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKD',
                'nama_surat' => 'Surat Keterangan Domisili',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan tempat tinggal atau domisili seorang penduduk.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKU',
                'nama_surat' => 'Surat Keterangan Usaha',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan bahwa penduduk memiliki atau menjalankan suatu usaha.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKK',
                'nama_surat' => 'Surat Keterangan Kematian',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan peristiwa kematian seorang penduduk.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKL',
                'nama_surat' => 'Surat Keterangan Lahir',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan kelahiran seorang penduduk.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKP',
                'nama_surat' => 'Surat Keterangan Penghasilan',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan penghasilan seorang penduduk.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKBM',
                'nama_surat' => 'Surat Keterangan Belum Menikah',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan bahwa seorang penduduk belum pernah menikah.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKM',
                'nama_surat' => 'Surat Keterangan Menikah',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan status perkawinan seorang penduduk.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKT',
                'nama_surat' => 'Surat Keterangan Tanah',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan kepemilikan atau penguasaan suatu bidang tanah.',
                'is_active' => true,
            ],

            [
                'kode_surat' => 'SKH',
                'nama_surat' => 'Surat Keterangan Ahli Waris',
                'deskripsi_surat' => 'Surat keterangan yang menerangkan pihak-pihak yang memiliki hubungan sebagai ahli waris.',
                'is_active' => true,
            ],
        ];

        foreach ($jenisSurat as $data) {
            JenisSuratModel::create($data);
        }
    }
}
