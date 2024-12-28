<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';

    protected $fillable = [
        'nama_pengguna', 'email', 'password', 'path_photo', 'photo'
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'id_pengguna', 'id_pengguna');
    }
}
