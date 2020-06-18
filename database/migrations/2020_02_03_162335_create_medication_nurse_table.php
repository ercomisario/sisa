<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_nurse', function (Blueprint $table) {
            
            $table->timestamps();
            $table->integer('nurse_id')->unsigned();
            $table->integer('medication_id')->unsigned();
            $table->text('observation')->nullable();
            $table->boolean('status');

            //relacion
            $table->foreign('nurse_id')->references('id')->on('nurses')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('medication_id')->references('id')->on('medications')
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
        Schema::dropIfExists('medication_nurse');
    }
}
