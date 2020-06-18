<?php

use App\ClinicalCase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MedicalOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicalCase = ClinicalCase::find(1);
        $medicalOrders = $clinicalCase->medicalOrders()->createMany([
            ['doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id],
            ['doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id],
            ['doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id],
            ['doctor_id' => $clinicalCase->medicalReport->medicalConsultation->doctor_id],
        ]);
        //medicacion orden 1
        $date = new Carbon;

        $medication = $medicalOrders[0]->medication()->create([
            'dose' => 10,
            'frequency' => 8,
            'presentation_id'=> 3,
            'start_time' => $date->now(),
            'end_time' => $date->addDays(3)
        ]);
        $medication->nurses()->attach(1,[
            'observation' => 'tenia mucha fiebre',
            'status' => true

        ]);
        //medicacion orden 2
        $medication = $medicalOrders[1]->medication()->create([
            'dose' => 5,
            'frequency' => 6,
            'presentation_id'=> 8,
            'start_time' => $date->now(),
            'end_time' => $date->addDays(3)
        ]);
        $medication->nurses()->attach(1,[
            'observation' => 'paciente reuso que le pusieran el medicamento',
            'status' => false

        ]);
        //examen vacio orden 3
        $medicalTest = $medicalOrders[2]->medicalTest()->create([
            'test_type' => 'sangre',
            'reason' => 'presenta cuadro de anemia'
        ]);
        $medicalTest->nurses()->attach(1);
        //cuidado orden 4

        $healthCare = $medicalOrders[3]->healthCare()->create([
            'description' => 'mantener las piernas elevadas',
            'start_date' => $date->now()
            
        ]);
        $healthCare->nurses()->attach(2,[
            'observation' => 'pasiente reuso al cuidado',
            'status' => false
        ]);


    }
}
