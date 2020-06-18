<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalJustificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_justifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('qr_code');
            $table->string('qr_path');
            $table->text('description');
            $table->integer('clinical_case_id')->unsigned();

            //relacion
            $table->foreign('clinical_case_id')->references('id')->on('clinical_cases')
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
        Schema::dropIfExists('medical_justifications');
    }
}
