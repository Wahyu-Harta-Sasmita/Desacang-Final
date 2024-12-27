<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('komentars', function (Blueprint $table) {
        $table->id('id_komentar');
        $table->unsignedBigInteger('id_pengguna');
        $table->unsignedBigInteger('id_article');
        $table->string('komentar');
        $table->timestamps();
        $table->foreign('id_pengguna')->references('id_pengguna')->on('penggunas');
        $table->foreign('id_article')->references('id_article')->on('articles');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
