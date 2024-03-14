<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratBebasPustaka extends Model
{
    use HasFactory;

    protected $table = 'surat_bebas_pustaka';
    protected $fillable = ['nomor_surat', 'nama_mhs', 'npm', 'prodi', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
