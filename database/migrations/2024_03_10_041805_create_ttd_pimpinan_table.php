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
        Schema::create('ttd_pimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pimpinan');
            $table->enum('prodi_pimpinan', ['Informatika', 'Sistem Informasi', 'Wadek']);
            $table->string('penanda_tangan');
            $table->string('ttd_image');
            $table->string('nomor_induk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttd_pimpinan');
    }
};
