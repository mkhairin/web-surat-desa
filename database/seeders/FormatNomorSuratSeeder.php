<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormatNomorSurat as FormatNomorSuratModel;
use App\Models\JenisSurat as JenisSuratModel;

class FormatNomorSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sktm = JenisSuratModel::where('kode_surat', 'SKTM')->firstOrFail();
        $sku = JenisSuratModel::where('kode_surat', 'SKU')->firstOrFail();
        $skd = JenisSuratModel::where('kode_surat', 'SKD')->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | SKTM - 2026
        |--------------------------------------------------------------------------
        */

        FormatNomorSuratModel::create([
            'jenis_surat_id' => $sktm->id,
            'format' => '{nomor}/SKTM/{bulan_romawi}/{tahun}',
            'current_number' => 15,
            'year' => 2026,
            'is_active' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SKTM - 2025
        |--------------------------------------------------------------------------
        */

        FormatNomorSuratModel::create([
            'jenis_surat_id' => $sktm->id,
            'format' => '{nomor}/SKTM/{bulan_romawi}/{tahun}',
            'current_number' => 127,
            'year' => 2025,
            'is_active' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SKU - 2026
        |--------------------------------------------------------------------------
        */

        FormatNomorSuratModel::create([
            'jenis_surat_id' => $sku->id,
            'format' => '{nomor}/SKU/{bulan_romawi}/{tahun}',
            'current_number' => 8,
            'year' => 2026,
            'is_active' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | SKD - 2026
        |--------------------------------------------------------------------------
        */

        FormatNomorSuratModel::create([
            'jenis_suratr_id' => $skd->id,
            'format' => '{nomor}/SKD/{bulan_romawi}/{tahun}',
            'current_number' => 21,
            'year' => 2026,
            'is_active' => true,
        ]);
    }
}
