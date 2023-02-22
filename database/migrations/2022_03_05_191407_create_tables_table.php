<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->string('image');
            $table->string('alt');
            $table->text('about');
            $table->boolean('game_master');
            $table->date('date');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->integer('game_system_id');
            $table->foreign('game_system_id')->references('id')->on('game_systems');
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
        Schema::dropIfExists('tables');
    }
};
