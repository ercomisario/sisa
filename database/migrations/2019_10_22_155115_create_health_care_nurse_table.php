<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthCareNurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_care_nurse', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('observation');
            $table->boolean('status');
            $table->integer('nurse_id')->unsigned();
            $table->integer('health_care_id')->unsigned();

            //relacion
            $table->foreign('nurse_id')->references('id')->on('nurses')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('health_care_id')->references('id')->on('health_cares')
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
        Schema::dropIfExists('health_care_nurse');
    }
}
