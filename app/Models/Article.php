<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'id_article';
    protected $guarded = [];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'id_article');
    }
}
