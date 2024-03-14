<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
use HasFactory;

  protected $table = 'mahasiswa';

  protected $fillable = [
    'user_id',
    'semester',
    'prodi',
    'domisili',
    'jenis_kelamin',
    'no_hp',
    'status',
    'foto'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
