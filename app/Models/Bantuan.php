<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    protected $primaryKey = 'id_bantuan';
    protected $guarded = [];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'bantuan_id', 'id_bantuan');
    }
}
