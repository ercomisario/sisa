<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorMedicalCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_medical_center', function (Blueprint $table) {
            
            $table->integer('medical_center_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('shift_id')->unsigned();

            $table->timestamps();

            
            //relacion
            $table->foreign('medical_center_id')->references('id')->on('medical_centers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //relacion
            $table->foreign('doctor_id')->references('id')->on('doctors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('shift_id')->references('id')->on('shifts')
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
        Schema::dropIfExists('medical_center_doctor');
    }
}
