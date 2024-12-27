<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $primaryKey = 'id_pengguna';
    protected $guarded = [];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'id_pengguna');
    }
}