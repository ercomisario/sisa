<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalCenterNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_center_nurse', function (Blueprint $table) {
            $table->integer('medical_center_id')->unsigned();
            $table->integer('nurse_id')->unsigned();
            $table->timestamps();

            //relacion
            $table->foreign('medical_center_id')->references('id')->on('medical_centers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //relacion
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
        Schema::dropIfExists('medical_center_nurse');
    }
}
