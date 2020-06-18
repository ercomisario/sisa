<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('temperatura')->unsigned();
            $table->integer('pulse')->unsigned();
            $table->integer('respiratory_rate')->unsigned();
            $table->integer('max_t')->unsigned();
            $table->integer('min_t')->unsigned();
            $table->integer('clinical_case_id')->unsigned();
            $table->integer('nurse_id')->unsigned();

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
        Schema::dropIfExists('vital_signs');
    }
}
