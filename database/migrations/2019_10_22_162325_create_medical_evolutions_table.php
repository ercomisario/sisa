<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_evolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('observation');
            $table->integer('doctor_id')->unsigned();
            $table->integer('clinical_case_id')->unsigned();

             //relacion
             $table->foreign('clinical_case_id')->references('id')->on('clinical_cases')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('medical_evolutions');
    }
}
