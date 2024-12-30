<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    protected $primaryKey = 'id_validasi';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'validasi_id', 'id_validasi');
    }
}