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
        Schema::create('surat_izin_penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('nama_mhs');
            $table->bigInteger('npm');
            $table->integer('semester');
            $table->enum('prodi',['Informatika', 'Sistem Informasi']);
            $table->enum('lingkup',['Internal', 'Eksternal']);
            $table->string('tujuan_surat');
            $table->string('tujuan_instansi');
            $table->string('domisili_instansi');
            $table->string('judul_penelitian');
            $table->string('jenis_surat')->default('Surat Izin Penelitian');
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
        Schema::dropIfExists('surat_izin_penelitian');
    }
};
