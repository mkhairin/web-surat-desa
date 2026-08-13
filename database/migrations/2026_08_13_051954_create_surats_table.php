<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id');
            $table->foreignId('jenis_surat_id');
            $table->foreignId('template_surat_id');
            $table->varchar('nomor_surat');
            $table->varchar('status');
            $table->date('tanggal_terbit');
            $table->foreignId('dibuat_oleh');
            $table->foreignId('disetujui_oleh');
            $table->json('data_surat');
            $table->varchar('file_pdf');
            $table->varchar('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
