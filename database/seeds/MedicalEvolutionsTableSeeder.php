<?php

use Illuminate\Database\Seeder;

class MedicalEvolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->medicalEvolutions()->createMany([
            [
                'observation' => 'Paciente masculino ingresa presentando dolor de cabeza, y fiebre',
                'doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id
            ],
            [
                'observation' => 'Pasiente no presenta mejoria se pidieron examenes de sangre para determinar las causas',
                'doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id
            ]

        ]);
    }
}
