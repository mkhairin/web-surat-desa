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
            $table->foreignId('jenis_surat_id');
            $table->varchar('format');
            $table->integer('current_number');
            $table->timestamps();
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
