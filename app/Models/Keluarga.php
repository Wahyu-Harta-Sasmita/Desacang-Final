<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $primaryKey = 'id_keluarga';
    protected $guarded = [];

    /**
     * Relasi dengan tabel Penduduk menggunakan id_keluarga.
     */
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'id_keluarga');
    }

    /**
     * Mengambil nama kepala keluarga secara manual jika tidak ada foreign key.
     * Asumsi: 'kepala_keluarga' menyimpan nama kepala keluarga (bukan ID).
     */
    public function getKepalaKeluargaNameAttribute()
    {
        return $this->kepala_keluarga; // Hanya mengembalikan nama dari kolom kepala_keluarga.
    }

    /**
     * Relasi dengan tabel Bantuan menggunakan id_keluarga.
     */
    public function bantuans()
    {
        return $this->hasMany(Bantuan::class, 'id_keluarga');
    }
}
