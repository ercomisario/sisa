<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('person_id')->unsigned();
            $table->integer('speciality_id')->unsigned();
            $table->string('license');

            //relacion
            $table->foreign('person_id')->references('id')->on('people')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('speciality_id')->references('id')->on('specialities')
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
        Schema::dropIfExists('doctors');
    }
}
