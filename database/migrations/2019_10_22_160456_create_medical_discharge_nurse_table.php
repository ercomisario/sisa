<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalDischargeNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_discharge_nurse', function (Blueprint $table) {
            
            $table->timestamps();
            $table->integer('medical_discharge_id')->unsigned();
            $table->integer('nurse_id')->unsigned();
            $table->boolean('status');

            //relacion
            $table->foreign('nurse_id')->references('id')->on('nurses')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('medical_discharge_id')->references('id')->on('medical_discharges')
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
        Schema::dropIfExists('medical_discharge_nurse');
    }
}
