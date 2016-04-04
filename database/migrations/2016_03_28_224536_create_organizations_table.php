<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('place');
            $table->string('logo');
            $table->boolean('approved');
            $table->enum('type', ['imone', 'asmuo']);
            $table->text('description');
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->integer('organization_data_id')->nullable()->unsigned();
            $table->foreign('organization_data_id')->references('id')->on('organization_data')->onDelete('set null');
            $table->integer('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->integer('junction_id')->nullable()->unsigned();
            $table->foreign('junction_id')->references('id')->on('junctions')->onDelete('set null');
            $table->integer('opening_time_id')->nullable()->unsigned();
            $table->foreign('opening_time_id')->references('id')->on('opening_times')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('organizations_facilities', function (Blueprint $table) {
            $table->integer('organization_id')->unsigned()->index();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');

            $table->integer('facility_id')->unsigned()->index();
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');

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
        Schema::drop('organizations_facilities');
        Schema::drop('organizations');
    }
}
