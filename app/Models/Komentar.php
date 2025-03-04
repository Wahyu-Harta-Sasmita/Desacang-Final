<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $primaryKey = 'id_komentar';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
