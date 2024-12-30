<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->string('komentar', 255);
            $table->foreignId('id_pengguna')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
};