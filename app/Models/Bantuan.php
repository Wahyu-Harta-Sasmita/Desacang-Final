<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $primaryKey = 'id_bantuan';
    protected $guarded = [];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }
}
