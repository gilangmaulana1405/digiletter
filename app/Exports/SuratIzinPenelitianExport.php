<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\SuratIzinPenelitian;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratIzinPenelitianExport implements FromCollection, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'Nomor Surat',
            'Nama Mahasiswa',
            'NPM',
            'Semester',
            'Prodi',
            'Lingkup',
            'Tujuan Surat',
            'Tujuan Instansi',
            'Domisili Instansi',
            'Judul Penelitian',
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
            $surat->lingkup,
            $surat->tujuan_surat,
            $surat->tujuan_instansi,
            $surat->domisili_instansi,
            $surat->jenis_surat,
            $surat->judul_penelitian,
            Carbon::parse($surat->updated_at)->translatedFormat('j F Y'),
            $surat->keterangan,
            $surat->status,
        ];
    }

    public function collection()
    {
        return SuratIzinPenelitian::select('created_at','nomor_surat','nama_mhs', 'npm', 'semester','prodi', 'lingkup', 'tujuan_surat', 'tujuan_instansi', 'domisili_instansi', 'judul_penelitian','jenis_surat', 'updated_at','keterangan', 'status')->get();
    }
}
