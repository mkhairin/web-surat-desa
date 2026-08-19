<?php

namespace Database\Seeders;

use App\Models\FieldSurat as FieldSuratModel;
use App\Models\JenisSurat as JenisSuratModel;
use Illuminate\Database\Seeder;

class FieldSuratSeeder extends Seeder
{
    public function run(): void
    {
        $sktm = JenisSuratModel::where('kode_surat', 'SKTM')->firstOrFail();

        $sku = JenisSuratModel::where('kode_surat', 'SKU')->firstOrFail();

        $skd = JenisSuratModel::where('kode_surat', 'SKD')->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | SKTM
        |--------------------------------------------------------------------------
        */

        FieldSuratModel::create([
            'jenis_surat_id' => $sktm->id,
            'field_name' => 'tujuan',
            'field_label' => 'Tujuan Penggunaan Surat',
            'field_type' => 'select',
            'field_options' => [
                'Pendidikan',
                'Kesehatan',
                'Bantuan Sosial',
                'Administrasi',
                'Lainnya',
            ],
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $sktm->id,
            'field_name' => 'penghasilan_bulanan',
            'field_label' => 'Penghasilan Bulanan',
            'field_type' => 'number',
            'field_options' => null,
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $sktm->id,
            'field_name' => 'jumlah_tanggungan',
            'field_label' => 'Jumlah Tanggungan',
            'field_type' => 'number',
            'field_options' => null,
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 3,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SKU
        |--------------------------------------------------------------------------
        */

        FieldSuratModel::create([
            'jenis_surat_id' => $sku->id,
            'field_name' => 'nama_usaha',
            'field_label' => 'Nama Usaha',
            'field_type' => 'text',
            'field_options' => null,
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $sku->id,
            'field_name' => 'jenis_usaha',
            'field_label' => 'Jenis Usaha',
            'field_type' => 'radio',
            'field_options' => [
                'Perdagangan',
                'Jasa',
                'Pertanian',
                'Peternakan',
                'Perikanan',
                'Lainnya',
            ],
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $sku->id,
            'field_name' => 'alamat_usaha',
            'field_label' => 'Alamat Usaha',
            'field_type' => 'textarea',
            'field_options' => null,
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $sku->id,
            'field_name' => 'fasilitas_usaha',
            'field_label' => 'Fasilitas Usaha',
            'field_type' => 'checkbox',
            'field_options' => [
                'Tempat Usaha',
                'Gudang',
                'Kendaraan',
                'Peralatan',
            ],
            'is_required' => false,
            'is_active' => true,
            'sort_order' => 4,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SKD
        |--------------------------------------------------------------------------
        */

        FieldSuratModel::create([
            'jenis_surat_id' => $skd->id,
            'field_name' => 'keperluan',
            'field_label' => 'Keperluan',
            'field_type' => 'textarea',
            'field_options' => null,
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        FieldSuratModel::create([
            'jenis_surat_id' => $skd->id,
            'field_name' => 'status_tempat_tinggal',
            'field_label' => 'Status Tempat Tinggal',
            'field_type' => 'radio',
            'field_options' => [
                'Milik Sendiri',
                'Kontrak',
                'Sewa',
                'Menumpang',
            ],
            'is_required' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);
    }
}
