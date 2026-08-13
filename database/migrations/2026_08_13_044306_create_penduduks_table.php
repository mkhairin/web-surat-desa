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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->varchar('nik')->unique();
            $table->varchar('no_kk');
            $table->varchar('nama_lengkap');
            $table->varchar('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->varchar('jenis_kelamin');
            $table->varchar('agama');
            $table->varchar('pekerjaan');
            $table->varchar('pendidikan');
            $table->varchar('status_perkawinan');
            $table->varchar('kewarganegaraan');
            $table->text('alamat');
            $table->varchar('rt');
            $table->varchar('rw');
            $table->varchar('desa');
            $table->varchar('kecamatan');
            $table->varchar('kabupaten');
            $table->varchar('provinsi');
            $table->varchar('kode_pos');
            $table->varchar('no_telp');
            $table->varchar('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
