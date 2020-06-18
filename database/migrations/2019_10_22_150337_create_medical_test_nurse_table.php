<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTestNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_test_nurse', function (Blueprint $table) {
            
            $table->timestamps();
            $table->string('file')->default('');

            $table->integer('nurse_id')->unsigned();
            $table->integer('medical_test_id')->unsigned();

            //relacion
            //relacion
            $table->foreign('nurse_id')->references('id')->on('nurses')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('medical_test_id')->references('id')->on('medical_tests')
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
        Schema::dropIfExists('medical_test_nurse');
    }
}
