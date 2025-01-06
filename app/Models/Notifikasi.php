<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $fillable = ['penduduk_id', 'message'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}