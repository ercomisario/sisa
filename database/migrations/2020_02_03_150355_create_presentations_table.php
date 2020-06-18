<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->float('minimum_quantity');
            $table->float('maximum_quantity');
            $table->text('description');
            $table->integer('administer_route_id')->unsigned();
            $table->integer('component_id')->unsigned();
            $table->integer('presentation_type_id')->unsigned();

            //relaciones
            //relacion
            $table->foreign('administer_route_id')->references('id')->on('administer_routes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('component_id')->references('id')->on('components')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('presentation_type_id')->references('id')->on('presentation_types')
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
        Schema::dropIfExists('presentations');
    }
}
