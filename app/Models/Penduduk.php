<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';

    protected $fillable = [
        'nama', 'nik', 'no_kk', 'kepala_keluarga', 'jumlah_keluarga', 'pekerjaan', 'gaji', 
        'alamat', 'no_rumah', 'desa', 'banjar', 'kategori', 'geolocation', 'path_rumah', 
        'rumah', 'path_kk', 'kk', 'bantuan_id'
    ];

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id', 'id_bantuan');
    }
}
