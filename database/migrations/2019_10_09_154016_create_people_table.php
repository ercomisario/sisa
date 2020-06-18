<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('last_name');
            $table->string('cedula');
            $table->date('birthday');
            $table->string('social_number');
            $table->string('phone');
            $table->string('sexo');
            $table->integer('blood_type_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->string('avatar_path')->nullable();

            //relacion
            $table->foreign('location_id')->references('id')->on('locations')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //relacion
            $table->foreign('blood_type_id')->references('id')->on('blood_types')
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
        Schema::dropIfExists('people');
    }
}