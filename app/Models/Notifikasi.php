<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $primaryKey = 'id_notifikasi';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}