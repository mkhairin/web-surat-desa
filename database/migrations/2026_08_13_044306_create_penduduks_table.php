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
            $table->string('nik', length: 16)->unique();
            $table->string('no_kk', length: 16);
            $table->string('nama_lengkap', length: 100);
            $table->string('tempat_lahir', length: 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama', length: 30);
            $table->string('pekerjaan', length: 100);
            $table->string('pendidikan', length: 20);
            $table->enum('status_perkawinan', [
                'belum_menikah',
                'menikah',
                'cerai_hidup',
                'cerai_mati',
            ]);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->text('alamat');
            $table->string('rt', length: 3);
            $table->string('rw', length: 3);
            $table->string('desa', length: 100);
            $table->string('kecamatan', length: 100);
            $table->string('kabupaten', length: 100);
            $table->string('provinsi', length: 100);
            $table->string('kode_pos', length: 5);
            $table->string('no_telp', length: 20);
            $table->string('email', length: 100)->nullable();
            $table->softDeletes();
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
