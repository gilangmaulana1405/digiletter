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
        Schema::create('surat_keterangan_aktif', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('nama_mhs');
            $table->bigInteger('npm');
            $table->string('semester');
            $table->enum('prodi',['Informatika', 'Sistem Informasi']);
            $table->enum('lingkup',['Internal', 'Eksternal']);
            $table->string('tgl_lahir');
            $table->text('alamat');
            $table->string('jenis_surat')->default('Surat Keterangan Aktif Kuliah');
            $table->string('file_path')->nullable();
            $table->string('keterangan')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_aktif');
    }
};
