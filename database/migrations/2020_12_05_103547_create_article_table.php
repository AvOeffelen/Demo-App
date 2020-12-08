<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('has_video')->default(0);
            $table->unsignedBigInteger('category_id')->unsinged()->references('id')->on('category');
            $table->unsignedBigInteger('sub_category_id')->nullable()->unsinged()->references('id')->on('sub_category');
            $table->text('text');
            $table->text('video_link')->nullable();
            $table->text('image_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
