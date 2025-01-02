<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('id_article');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul', 255);
            $table->string('cover_article', 255)->default('assets/uploads/article_cover/');
            $table->string('path_article', 255)->default('assets/uploads/article/');
            $table->string('article', 255);
            $table->string('deskripsi', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};