<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnesisRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnesis_records', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('clinical_case_id')->unsigned();

             //relacion
             $table->foreign('clinical_case_id')->references('id')->on('clinical_cases')
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
        Schema::dropIfExists('anamnesis_records');
    }
}
