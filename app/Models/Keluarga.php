<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $primaryKey = 'id_keluarga';
    protected $guarded = [];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'id_keluarga');
    }

    public function kepalaKeluarga()
    {
        return $this->belongsTo(Penduduk::class, 'kepala_keluarga');
    }

    public function bantuans()
    {
        return $this->hasMany(Bantuan::class, 'id_keluarga');
    }
}
