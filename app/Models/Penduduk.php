<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduks';
    protected $primaryKey = 'id_penduduk';
    protected $guarded = [];

    /**
     * Relasi dengan tabel Keluarga.
     */
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id_keluarga');
    }

    /**
     * Scope untuk mencari penduduk berdasarkan kategori
     */
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Accessor untuk mendapatkan informasi lengkap alamat
     */
    public function getAlamatLengkapAttribute()
    {
        return "{$this->alamat} No. {$this->no_rumah}, Banjar {$this->banjar}, Desa {$this->desa}";
    }
}
