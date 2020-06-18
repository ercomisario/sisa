<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('status_discharge')->default(false);//campo para diferencial ordenes prescritas en egreso o consulta
            
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
        Schema::dropIfExists('medical_orders');
    }
}
