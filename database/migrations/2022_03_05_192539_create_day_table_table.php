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
        Schema::create('day_table', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('day_id');
            $table->foreign('day_id')->references('id')->on('days');
            $table->integer('table_id');
            $table->foreign('table_id')->references('id')->on('tables');
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
        Schema::dropIfExists('day_table');
    }
};
