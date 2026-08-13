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
        Schema::create('field_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surat_id');
            $table->varchar('field_name');
            $table->varchar('field_label');
            $table->varchar('field_type');
            $table->boolean('is_required');
            $table->integer('sort_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_surat');
    }
};
