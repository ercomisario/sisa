<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('reason')->nullable();//
            $table->dateTime('agreeded_date');//fecha acordada
            $table->boolean('status');
            $table->integer('medical_report_id')->unsigned();

            
            //relacion
            $table->foreign('medical_report_id')->references('id')->on('medical_reports')
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
        Schema::dropIfExists('admissions');
    }
}

