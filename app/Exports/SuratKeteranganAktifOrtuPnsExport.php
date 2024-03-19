<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\SuratKeteranganAktifOrtuPns;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratKeteranganAktifOrtuPnsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'Nomor Surat',
            'Nama Mahasiswa',
            'NPM',
            'Semester',
            'Prodi',
            'Alamat',
            'Nama Orang Tua',
            'Nomor Induk Orang Tua',
            'Jabatan Orang Tua',
            'Instansi Orang Tua',
            'Jenis Surat',
            'Periode',
            'Tahun Akademik',
            'Tanggal Approve',
            'Keterangan',
            'Status',
        ];
    }

    public function map($surat): array
    {
        return [
            Carbon::parse($surat->created_at)->translatedFormat('j F Y'),
            $surat->nomor_surat,
            $surat->nama_mhs,
            "'" . $surat->npm,
            $surat->semester,
            $surat->prodi,
            $surat->alamat,
            $surat->nama_ortu,
            "'" . $surat->nomor_induk_ortu,
            $surat->jabatan_ortu,
            $surat->instansi,
            $surat->jenis_surat,
            $surat->periode,
            $surat->tahun_akademik,
            Carbon::parse($surat->updated_at)->translatedFormat('j F Y'),
            $surat->keterangan,
            $surat->status,
        ];
    }

    public function collection()
    {
        return SuratKeteranganAktifOrtuPns::select('created_at', 'nomor_surat', 'nama_mhs', 'npm', 'semester', 'prodi', 'alamat', 'nama_ortu', 'nomor_induk_ortu', 'jabatan_ortu', 'instansi', 'jenis_surat', 'periode', 'tahun_akademik', 'updated_at', 'keterangan', 'status')->get();
    }
}
