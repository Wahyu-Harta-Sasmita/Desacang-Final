<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id('id_bantuan');
            $table->string('jenis_bantuan', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bantuans');
    }
};