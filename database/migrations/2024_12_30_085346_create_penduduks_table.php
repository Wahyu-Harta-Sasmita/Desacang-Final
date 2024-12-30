<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('validasi_id')->nullable()->constrained('validasis', 'id_validasi');
            $table->string('nama', 50);
            $table->string('nik', 16);
            $table->string('kepala_keluarga', 50);
            $table->integer('jumlah_keluarga');
            $table->string('no_kk');
            $table->string('pekerjaan', 50);
            $table->integer('gaji');
            $table->string('alamat', 255);
            $table->string('no_rumah', 50);
            $table->string('desa', 50);
            $table->string('banjar', 50);
            $table->string('kategori', 50);
            $table->string('geolocation', 255);
            $table->string('path_rumah', 255)->default('assets/uploads/rumah/');
            $table->string('rumah', 255);
            $table->string('path_kk', 255)->default('assets/uploads/kk/');
            $table->string('kk', 255);
            $table->foreignId('bantuan_id')->constrained('bantuans', 'id_bantuan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
};