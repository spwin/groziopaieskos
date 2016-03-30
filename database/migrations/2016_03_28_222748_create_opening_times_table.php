<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monday')->nullable()->unsigned();
            $table->foreign('monday')->references('id')->on('days');
            $table->integer('tuesday')->nullable()->unsigned();
            $table->foreign('tuesday')->references('id')->on('days');
            $table->integer('wednesday')->nullable()->unsigned();
            $table->foreign('wednesday')->references('id')->on('days');
            $table->integer('thursday')->nullable()->unsigned();
            $table->foreign('thursday')->references('id')->on('days');
            $table->integer('friday')->nullable()->unsigned();
            $table->foreign('friday')->references('id')->on('days');
            $table->integer('saturday')->nullable()->unsigned();
            $table->foreign('saturday')->references('id')->on('days');
            $table->integer('sunday')->nullable()->unsigned();
            $table->foreign('sunday')->references('id')->on('days');
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
        Schema::drop('opening_times');
    }
}
