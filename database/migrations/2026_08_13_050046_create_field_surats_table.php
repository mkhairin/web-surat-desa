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
            $table->foreignId('jenis_surat_id')->constrained('jenis_surat')->cascadeOnDelete();
            $table->string('field_name', length: 100);
            $table->string('field_label', length: 100);
            $table->enum('field_type', [
                'text',
                'textarea',
                'number',
                'date',
                'select',
                'radio',
                'checkbox',
            ]);
            $table->json('field_options')->nullable();
            $table->boolean('is_required')->default(true);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->unique(
                ['jenis_surat_id', 'field_name'],
                'field_surat_jenis_field_unique'
            );
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
