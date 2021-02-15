<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {

            $table->id();

            $table->string('record_class', 50);
            $table->unsignedBigInteger('record_id');

            $table->string('session_id', 255)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            $table->string('user_agent', 255)->nullable();

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
        Schema::dropIfExists('activity');
    }
}
