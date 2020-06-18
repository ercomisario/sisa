<?php

use Illuminate\Database\Seeder;

class ClinicalCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ClinicalCase::create([
            'medical_record_id' => 1,
            'medical_report_id' => 1,
            'status' => false
        ]);
    }
}
