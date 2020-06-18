<?php

use Illuminate\Database\Seeder;

class MedicalReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\MedicalReport::create([
            'diagnostic' => 'Ausencia de la mestruacion por largos lapsos',
            'disease_id' => '24',
            'medical_consultation_id' => 1
        ]);
    }
}
