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
            $table->foreignId('penduduk_id')->constrained('penduduk')->restrictOnDelete();
            $table->foreignId('jenis_surat_id')->constrained('jenis_surat')->restrictOnDelete();
            $table->foreignId('template_surat_id')->constrained('template_surat')->restrictOnDelete();
            $table->string('nomor_surat', length: 50);
            $table->enum('status', [
                'draft',
                'menunggu',
                'disetujui',
                'ditolak'
            ])->default('draft');
            $table->date('tanggal_terbit');
            $table->foreignId('dibuat_oleh')->constrained('users')->restrictOnDelete();
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->json('data_surat');
            $table->string('file_pdf', length: 500);
            $table->string('catatan', length: 2000)->nullable();
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
