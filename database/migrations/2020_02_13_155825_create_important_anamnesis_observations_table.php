<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantAnamnesisObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('important_anamnesis_observations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('anamnesis_record_id')->unsigned();
            $table->text('description');
            $table->integer('important_item_group_id')->unsigned();
            $table->integer('medical_record_id')->unsigned();

             //relacion
             $table->foreign('anamnesis_record_id')->references('id')->on('anamnesis_records')
             ->onDelete('cascade')
             ->onUpdate('cascade');

             $table->foreign('important_item_group_id')->references('id')->on('important_item_groups')
             ->onDelete('cascade')
             ->onUpdate('cascade');

             $table->foreign('medical_record_id')->references('id')->on('medical_records')
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
        Schema::dropIfExists('important_anamnesis_observations');
    }
}
