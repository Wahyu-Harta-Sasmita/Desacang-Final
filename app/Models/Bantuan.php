<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    protected $table = 'bantuans';

    protected $fillable = [
        'jenis_bantuan',
    ];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'bantuan_id', 'id_bantuan');
    }
}
