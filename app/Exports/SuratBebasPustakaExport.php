<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\SuratBebasPustaka;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratBebasPustakaExport implements FromCollection, WithHeadings, WithMapping
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
            'Prodi',
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
            $surat->prodi,
            $surat->jenis_surat,
            Carbon::parse($surat->updated_at)->translatedFormat('j F Y'),
            $surat->keterangan,
            $surat->status,
        ];
    }

    public function collection()
    {
        return SuratBebasPustaka::select('created_at', 'nomor_surat', 'nama_mhs', 'npm', 'prodi',  'jenis_surat', 'updated_at', 'keterangan', 'status')->get();
    }
}
