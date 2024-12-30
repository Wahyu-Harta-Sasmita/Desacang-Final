<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('validasis', function (Blueprint $table) {
            $table->id('id_validasi');
            $table->foreignId('user_id')->constrained();
            $table->string('status', 10);
            $table->timestamp('validate_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('validasis');
    }
};