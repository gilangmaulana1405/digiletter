<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengajuanCuti extends Model
{
    use HasFactory;
    
    protected $table = 'surat_pengajuan_cuti';
    protected $fillable = ['nomor_surat', 'nama_mhs', 'npm', 'prodi','alamat','no_hp', 'alasan_cuti','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
