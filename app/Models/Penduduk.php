<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $primaryKey = 'id_penduduk';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id', 'id_bantuan');
    }

}