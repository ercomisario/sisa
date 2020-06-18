<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_referral', function (Blueprint $table) {
            $table->timestamps();
            $table->text('diagnostic');
            $table->text('observation');
            $table->integer('doctor_id')->unsigned();//medico de interconsulta
            $table->integer('referral_id')->unsigned();

            //relacion
            $table->foreign('doctor_id')->references('id')->on('doctors')
             ->onDelete('cascade')
             ->onUpdate('cascade');
             $table->foreign('referral_id')->references('id')->on('referrals')
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
        Schema::dropIfExists('doctor_referral');
    }
}
