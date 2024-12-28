<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluargas';
    protected $primaryKey = 'id_keluarga';
    protected $guarded = [];

    /**
     * Relasi dengan tabel Penduduk
     */
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'keluarga_id', 'id_keluarga');
    }

    /**
     * Mendapatkan daftar anggota keluarga
     */
    public function anggotaKeluarga()
    {
        return $this->penduduks()->orderBy('nama');
    }

    /**
     * Scope untuk mencari berdasarkan nomor KK
     */
    public function scopeNomorKK($query, $noKK)
    {
        return $query->where('no_kk', $noKK);
    }
}