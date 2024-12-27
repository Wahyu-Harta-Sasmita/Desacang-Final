<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $primaryKey = 'id_komentar';
    protected $guarded = [];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}
