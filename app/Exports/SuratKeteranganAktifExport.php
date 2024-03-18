<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\SuratKeteranganAktif;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratKeteranganAktifExport implements FromCollection, WithHeadings, WithMapping
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
            'Tanggal Lahir',
            'Alamat',
            'Jenis Surat',
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
            $surat->tgl_lahir,
            $surat->alamat,
            $surat->jenis_surat,
            Carbon::parse($surat->updated_at)->translatedFormat('j F Y'),
            $surat->keterangan,
            $surat->status,
        ];
    }
    
    public function collection()
    {
        return SuratKeteranganAktif::select('created_at','nomor_surat','nama_mhs', 'npm', 'semester','prodi', 'tgl_lahir', 'alamat', 'jenis_surat', 'updated_at','keterangan', 'status')->get();
    }
}
