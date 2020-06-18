<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('observation');
            $table->integer('nurse_id')->unsigned();
            $table->integer('clinical_case_id')->unsigned();

             //relacion
             $table->foreign('clinical_case_id')->references('id')->on('clinical_cases')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('nurse_id')->references('id')->on('nurses')
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
        Schema::dropIfExists('nurse_reports');
    }
}
