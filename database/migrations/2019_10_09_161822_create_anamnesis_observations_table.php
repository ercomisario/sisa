<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnesisObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnesis_observations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('anamnesis_record_id')->unsigned();
            $table->text('description');
            $table->integer('item_group_id')->unsigned();

             //relacion
             $table->foreign('anamnesis_record_id')->references('id')->on('anamnesis_records')
             ->onDelete('cascade')
             ->onUpdate('cascade');

             $table->foreign('item_group_id')->references('id')->on('item_groups')
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
        Schema::dropIfExists('anamnesis_observations');
    }
}
