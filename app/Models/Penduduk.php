<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $primaryKey = 'id_penduduk';
    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }

    public function keluargaAsKepala()
    {
        return $this->hasOne(Keluarga::class, 'kepala_keluarga');
    }
}
