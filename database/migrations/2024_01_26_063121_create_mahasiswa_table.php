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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('semester')->nullable();
            $table->enum('prodi',['Informatika', 'Sistem Informasi'])->nullable();
            $table->string('domisili')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('status', ['Aktif', 'Lulus', 'Drop Out'])->nullable();
            $table->string('foto')->nullable()->default('user_profile.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
