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
        Schema::create('keluargas', function (Blueprint $table) {
            $table->id('id_keluarga');
            $table->string('no_kk', 16)->unique();
            $table->string('kepala_keluarga', 50)->nullable(); // Tetap gunakan jika hanya menyimpan nama kepala keluarga
            $table->integer('jumlah_keluarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
