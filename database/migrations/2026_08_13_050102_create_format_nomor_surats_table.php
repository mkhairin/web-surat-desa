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
        Schema::create('format_nomor_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surat_id')->constrained('jenis_surat')->restrictOnDelete();
            $table->string('format', length: 255);
            $table->unsignedInteger('current_number')->default(0);
            $table->year('year');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['jenis_surat_id', 'year'], 'format_nomor_surat_jenis_year_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('format_nomor_surat');
    }
};
