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
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul', 255);
            $table->text('pesan');
            $table->string('tipe', 10);
            $table->timestamp('read_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifikasis');
    }
};