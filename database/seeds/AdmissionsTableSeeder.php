<?php

use Illuminate\Database\Seeder;

class AdmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admission::create([
            'reason' => 'Enfermedad',
            'agreeded_date' => '2019-11-30 14:22:33',
            'medical_report_id' => 1,
            'status' => true 
        ]);
    }
}
