<?php

use Illuminate\Database\Seeder;

class VitalSignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->vitalSigns()->createMany([
            [
                'temperatura' => 39,
                'pulse' => 80,
                'respiratory_rate' => 10,
                'max_t' => 170,
                'min_t' => 70,
                'nurse_id' => 1
            ],
            [
                'temperatura' => 36,
                'pulse' => 60,
                'respiratory_rate' => 5,
                'max_t' => 120,
                'min_t' => 20,
                'nurse_id' => 2
            ],
        ]);
    }
}
