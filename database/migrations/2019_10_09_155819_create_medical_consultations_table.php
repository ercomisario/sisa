<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->increments('id');
                       
            $table->dateTime('agreeded_date');//fecha acordada
            $table->string('reason');//
            
            $table->integer('doctor_id')->unsigned();
            $table->integer('attention_type_id')->unsigned();
            $table->integer('secretary_id')->unsigned();
            $table->integer('person_id')->unsigned();

            $table->timestamps();

            //relacion
            $table->foreign('attention_type_id')->references('id')->on('attention_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('doctor_id')->references('id')->on('doctors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('secretary_id')->references('id')->on('secretaries')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('person_id')->references('id')->on('people')
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
        Schema::dropIfExists('medical_consultations');
    }
}
