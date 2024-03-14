<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganAktifOrtuPns extends Model
{
    use HasFactory;
    protected $table = 'surat_keterangan_aktif_ortu_pns';
    protected $fillable = ['nomor_surat', 'nama_mhs', 'npm', 'prodi', 'semester', 'alamat','nama_ortu', 'nomor_induk_ortu', 'jabatan_ortu', 'instansi','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
