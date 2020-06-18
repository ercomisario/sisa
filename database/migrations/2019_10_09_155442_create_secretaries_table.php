<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecretariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretaries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('person_id')->unsigned();
            $table->integer('medical_center_id')->unsigned();

            //relacion
            $table->foreign('person_id')->references('id')->on('people')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('medical_center_id')->references('id')->on('medical_centers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secretaries');
    }
}
