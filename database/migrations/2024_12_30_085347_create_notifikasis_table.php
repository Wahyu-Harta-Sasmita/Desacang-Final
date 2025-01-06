<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->foreignId('penduduk_id')->constrained('penduduks', 'id_penduduk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul', 255)->default('Pemberitahuan Validasi');
            $table->string('pesan')->default('tidak ada pesan');
            $table->string('tipe', 10)-> default('validasi');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
};