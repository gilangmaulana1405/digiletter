<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganAktif extends Model
{
    use HasFactory;
    protected $table = 'surat_keterangan_aktif';
    protected $fillable = ['nomor_surat', 'nama_mhs', 'npm', 'prodi', 'semester','tempat_lahir', 'tgl_lahir', 'alamat', 'periode', 'tahun_akademik', 'bukti_pembayaran', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
