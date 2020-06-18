<?php

use Illuminate\Database\Seeder;

class NurseReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->nurseReports()->createMany([
            [
                'observation' => 'Recibo pasiente lucido con fiebre y dolor de cabeza',
                'nurse_id' => 1
            ],
        ]);
    }
}
