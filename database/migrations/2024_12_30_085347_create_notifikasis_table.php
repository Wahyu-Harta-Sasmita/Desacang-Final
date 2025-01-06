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
            // Ubah foreign key untuk mengacu pada 'id_penduduk', bukan 'id'
            $table->foreignId('penduduk_id')->constrained('penduduks', 'id_penduduk')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul', 255);
            $table->text('pesan');
            $table->string('tipe', 10);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
};