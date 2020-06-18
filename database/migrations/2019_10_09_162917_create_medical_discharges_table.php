<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_discharges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('final_diagnostic');
            $table->text('summary');
            $table->string('type');
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('medical_discharges');
    }
}
