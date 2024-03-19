<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\SuratPengajuanCuti;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratPengajuanCutiExport implements FromCollection, WithHeadings, WithMapping
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
            'Alamat',
            'No HP',
            'Alasan Cuti',
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
            $surat->no_hp,
            $surat->alasan_cuti,
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
        return SuratPengajuanCuti::select('created_at', 'nomor_surat', 'nama_mhs', 'npm', 'prodi',  'alamat', 'no_hp', 'alasan_cuti',  'jenis_surat', 'periode', 'tahun_akademik', 'updated_at', 'keterangan', 'status')->get();
    }
}
