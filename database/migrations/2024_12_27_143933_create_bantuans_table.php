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
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id('id_bantuan');
            $table->unsignedBigInteger('id_keluarga');
            $table->string('jenis_bantuan', 10);
            $table->string('path_rumah')->default('assets/uploads/rumah/');
            $table->string('rumah')->nullable();
            $table->string('path_kk')->default('assets/uploads/kk/');
            $table->string('kk')->nullable();
            $table->timestamps();
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluargas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
