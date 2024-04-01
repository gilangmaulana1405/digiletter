<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMahasiswa2017 = [];
        for ($i = 1; $i <= 222; $i++) {
            $npm = '171063117' . sprintf('%04d', $i);
            $dataMahasiswa2017[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2018 = [];
        for ($i = 1; $i <= 262; $i++) {
            $npm = '181063117' . sprintf('%04d', $i);
            $dataMahasiswa2018[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2019 = [];
        for ($i = 1; $i <= 242; $i++) {
            $npm = '191063117' . sprintf('%04d', $i);
            $dataMahasiswa2019[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2020 = [];
        for ($i = 1; $i <= 161; $i++) {
            $npm = '201063117' . sprintf('%04d', $i);
            $dataMahasiswa2020[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2021 = [];
        for ($i = 1; $i <= 159; $i++) {
            $npm = '211063117' . sprintf('%04d', $i);
            $dataMahasiswa2021[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2022 = [];
        for ($i = 1; $i <= 181; $i++) {
            $npm = '221063117' . sprintf('%04d', $i);
            $dataMahasiswa2022[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        $dataMahasiswa2023 = [];
        for ($i = 1; $i <= 162; $i++) {
            $npm = '231063117' . sprintf('%04d', $i);
            $dataMahasiswa2023[] = ['npm' => $npm, 'prodi' => 'Informatika'];
        }

        // =================== SI =====================
        $dataMahasiswaSI2019 = [];
        for ($i = 1; $i <= 54; $i++) {
            $npm = '191063125' . sprintf('%04d', $i);
            $dataMahasiswaSI2019[] = ['npm' => $npm, 'prodi' => 'Sistem Informasi'];
        }

        $dataMahasiswaSI2020 = [];
        for ($i = 1; $i <= 99; $i++) {
            $npm = '201063125' . sprintf('%04d', $i);
            $dataMahasiswaSI2020[] = ['npm' => $npm, 'prodi' => 'Sistem Informasi'];
        }

        $dataMahasiswaSI2021 = [];
        for ($i = 1; $i <= 90; $i++) {
            $npm = '211063125' . sprintf('%04d', $i);
            $dataMahasiswaSI2021[] = ['npm' => $npm, 'prodi' => 'Sistem Informasi'];
        }

        $dataMahasiswaSI2022 = [];
        for ($i = 1; $i <= 106; $i++) {
            $npm = '221063125' . sprintf('%04d', $i);
            $dataMahasiswaSI2022[] = ['npm' => $npm, 'prodi' => 'Sistem Informasi'];
        }

        $dataMahasiswaSI2023 = [];
        for ($i = 1; $i <= 107; $i++) {
            $npm = '231063125' . sprintf('%04d', $i);
            $dataMahasiswaSI2023[] = ['npm' => $npm, 'prodi' => 'Sistem Informasi'];
        }

        Mahasiswa::insert($dataMahasiswa2017);
        Mahasiswa::insert($dataMahasiswa2018);
        Mahasiswa::insert($dataMahasiswa2019);
        Mahasiswa::insert($dataMahasiswa2020);
        Mahasiswa::insert($dataMahasiswa2021);
        Mahasiswa::insert($dataMahasiswa2022);
        Mahasiswa::insert($dataMahasiswa2023);

        Mahasiswa::insert($dataMahasiswaSI2019);
        Mahasiswa::insert($dataMahasiswaSI2020);
        Mahasiswa::insert($dataMahasiswaSI2021);
        Mahasiswa::insert($dataMahasiswaSI2022);
        Mahasiswa::insert($dataMahasiswaSI2023);
    }
}
