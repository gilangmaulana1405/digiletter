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
        Schema::create('surat_keterangan_aktif_ortu_pns', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            // mahasiswa
            $table->string('nama_mhs');
            $table->bigInteger('npm');
            $table->string('semester');
            $table->enum('prodi',['Informatika', 'Sistem Informasi']);
            $table->text('alamat');
            
            // orang tua
            $table->string('nama_ortu');
            $table->string('nomor_induk_ortu');
            $table->string('jabatan_ortu');
            $table->string('instansi');


            $table->string('jenis_surat')->default('Surat Keterangan Aktif Kuliah Ortu PNS');
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
        Schema::dropIfExists('surat_keterangan_aktif_ortu_pns');
    }
};
