<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->text('article_url');
            $table->text('pic_url')->nullable();
            $table->string('pic_type',16)->nullable();
            $table->json('categories')->nullable();
            $table->dateTimeTz('published_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
