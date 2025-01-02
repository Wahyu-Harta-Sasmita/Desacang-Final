<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    // Primary key
    protected $primaryKey = 'id_validasi';

    // Timestamps
    public $timestamps = false; // Karena kolom timestamps (created_at, updated_at) tidak ada di tabel

    // Mass assignment
    protected $guarded = [];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Pastikan foreign key sesuai
    }

    // Relasi ke model Penduduk
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'validasi_id', 'id_validasi'); // Sesuaikan foreign key
    }
}
