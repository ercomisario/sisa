<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('dose');//este valor se va a validar con un rango de la tabla presentation
            $table->integer('frequency');//horas
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('status')->default(true);
            $table->integer('medical_order_id')->unsigned();
            $table->integer('presentation_id')->unsigned();

            
             //relacion
             $table->foreign('medical_order_id')->references('id')->on('medical_orders')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('presentation_id')->references('id')->on('presentations')
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
        Schema::dropIfExists('medications');
    }
}
