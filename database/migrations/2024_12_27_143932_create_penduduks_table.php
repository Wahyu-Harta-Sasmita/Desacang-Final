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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->string('nama', 50);
            $table->string('nik', 16)->unique();
            $table->string('pekerjaan', 50)->nullable();
            $table->integer('gaji')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_rumah', 50)->nullable();
            $table->string('desa', 50)->nullable();
            $table->string('banjar', 50)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->string('geolocation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
