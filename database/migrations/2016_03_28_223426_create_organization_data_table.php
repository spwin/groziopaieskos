<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imones_kodas');
            $table->string('pvm_kodas');
            $table->string('website');
            $table->string('name');
            $table->string('pavarde');
            $table->string('ind_veikl_nr');
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
        Schema::drop('organization_data');
    }
}
