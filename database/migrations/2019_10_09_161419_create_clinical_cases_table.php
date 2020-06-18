<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('status');
            $table->integer('medical_record_id')->unsigned();
            $table->integer('medical_report_id')->unsigned();

             //relacion
             $table->foreign('medical_report_id')->references('id')->on('medical_reports')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('medical_record_id')->references('id')->on('medical_records')
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
        Schema::dropIfExists('clinical_cases');
    }
}
