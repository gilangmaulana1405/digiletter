<?php

namespace App\Imports;

use Log;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\ValidationException;

class MahasiswaImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        // Jika NPM belum ada, buat instance Mahasiswa baru
        return new Mahasiswa([
            'npm' => isset($row['npm']) ? (string) $row['npm'] : '',
            'semester' => isset($row['semester']) ? $row['semester'] : '',
            'prodi' => isset($row['prodi']) ? $row['prodi'] : '',
            'domisili' => isset($row['domisili']) ? $row['domisili'] : '',
            'jenis_kelamin' => isset($row['jenis_kelamin']) ? $row['jenis_kelamin'] : '',
            'no_hp' => isset($row['no_hp']) ? (string) $row['no_hp'] : '',
            'status' => isset($row['status']) ? $row['status'] : '',
        ]);
    }

    // validasi npm unique

    public function rules(): array
    {
        return [
            'npm' => 'unique:mahasiswa,npm' // Validasi agar NPM bersifat unik di dalam tabel mahasiswa
        ];
    }

    public function customValidationMessages()
    {
        return [
            'npm.unique' => 'NPM sudah terdaftar pada sistem. Jika ada update data di excel, disarankan untuk membuat file baru yang tidak ada npm yang sama.' 
        ];
    }
}
