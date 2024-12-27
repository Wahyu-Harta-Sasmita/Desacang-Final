<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $primaryKey = 'id_penduduk';
    protected $guarded = [];

    /**
     * Relasi dengan tabel Keluarga berdasarkan id_keluarga.
     */
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }

    /**
     * Relasi kepala keluarga dihapus karena kolom 'kepala_keluarga' 
     * pada tabel keluargas tidak lagi menjadi foreign key.
     * Jika Anda ingin menyimpan data ini secara manual, akses langsung dari tabel.
     */
}
