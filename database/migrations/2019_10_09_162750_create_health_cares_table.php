<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthCaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_cares', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('description');
            $table->dateTime('start_date');
            $table->boolean('status')->default(true);
            $table->integer('medical_order_id')->unsigned();

             //relacion
             $table->foreign('medical_order_id')->references('id')->on('medical_orders')
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
        Schema::dropIfExists('health_cares');
    }
}
