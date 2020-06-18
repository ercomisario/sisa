<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class MedicalConsutationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon;
        $date->now();

        App\MedicalConsultation::create([
           
            'reason' => 'Presenta problemas mestruales',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '9',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Presenta hipertencion',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '3',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);
        
        App\MedicalConsultation::create([

            'reason' => 'Malestar generar',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor en el pecho',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '10',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([
         
            'reason' => 'Malestar General, Vomitos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '7',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Le duele el brazo derecho',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '3',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor de Cabeza',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '4',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Mareos y Fiebre',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '11',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([
           
            'reason' => 'Malestar General, nauseas',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '8',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Malestar Estomacal',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '3',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        

        App\MedicalConsultation::create([

            'reason' => 'Dolor de el pecho',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Diarrea frecuente',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '10',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Dolor',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor de Estomacal',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '3',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Mareos',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '9',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor adominal',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '4',
            'doctor_id' => 3,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([
           
            'reason' => 'Malestar General, nauseas',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '7',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);


        App\MedicalConsultation::create([

            'reason' => 'Dolor de Oído',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Mareos y zumbido en los oídos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '10',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);


        App\MedicalConsultation::create([
           
            'reason' => 'Malestar General, Vomitos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '7',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Malestar Estomacal, colicos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '3',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor de Cabeza',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Mareos y Fiebre',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '10',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);


        App\MedicalConsultation::create([
           
            'reason' => 'Malestar General, nauseas',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '7',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'Malestar Estomacal',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '3',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Malestar Estomacal y fiebre',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '7',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Malestar Estomacal y mareos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '8',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor de Garganta',
            'agreeded_date' => $date,
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);
        $date->addDay();

        App\MedicalConsultation::create([

            'reason' => 'zumbido en los oídos',
            'agreeded_date' => $date,
            'secretary_id' => '1',
            'person_id' => '10',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor',
            'agreeded_date' => $date->addDay(),
            'secretary_id' => '2',
            'person_id' => '6',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Dolor de Estomacal',
            'agreeded_date' => '2020-01-26 09:22:33',
            'secretary_id' => '2',
            'person_id' => '3',
            'doctor_id' => 2,
            'attention_type_id' => 3,
            
        ]);

        App\MedicalConsultation::create([

            'reason' => 'Mareos',
            'agreeded_date' => '2020-01-27 10:22:33',
            'secretary_id' => '2',
            'person_id' => '7',
            'doctor_id' => 1,
            'attention_type_id' => 3,
            
        ]);

    }
}
