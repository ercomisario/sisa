<?php

use Illuminate\Database\Seeder;

class AnamnesisRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //caso clinico 1
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->anamnesisRecord()->create();
    }
}
