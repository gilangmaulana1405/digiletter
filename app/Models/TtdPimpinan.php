<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtdPimpinan extends Model
{
    use HasFactory;
    protected $table = 'ttd_pimpinan';
    protected $fillable = ['penanda_tangan', 'ttd_image', 'nama_pimpinan', 'prodi_pimpinan', 'nomor_induk'];
}
