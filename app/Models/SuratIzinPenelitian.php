<?php

namespace App\Models;

use App\Models\TtdSuratIzinPenelitian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratIzinPenelitian extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_penelitian';
    protected $fillable = ['id_ttd','nomor_surat','nama_mhs', 'npm', 'prodi', 'lingkup', 'semester', 'tujuan_surat', 'tujuan_instansi', 'domisili_instansi', 'judul_penelitian', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
