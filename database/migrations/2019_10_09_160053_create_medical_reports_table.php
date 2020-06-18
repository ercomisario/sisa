<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('diagnostic');// diagnostico inicial
            $table->integer('medical_consultation_id')->unsigned();
            $table->integer('disease_id')->unsigned();//relacion con la enfermedad


            //relacion
            $table->foreign('medical_consultation_id')->references('id')->on('medical_consultations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('disease_id')->references('id')->on('diseases')
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
        Schema::dropIfExists('medical_reports');
    }
}
