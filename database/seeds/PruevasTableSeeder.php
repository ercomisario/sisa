<?php

use Illuminate\Database\Seeder;

class PruevasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $speciality_id;
    public $sexo;
    public function disease(){
        if($this->speciality_id == 4){
            $disease = rand(1,38);
        }
        if($this->speciality_id == 5){
            $disease = rand(39,72);
        }
        return $disease;
    }

    public function doctor(){
        if($this->sexo == 'Femenino' ){

            $doctor = rand(2,3);
        }
        if($this->sexo == 'Masculino' ){
            $doctor = 2;
        }
        return $doctor;
    }

    public function run()
    {
        factory(App\Location::class, 900)->create()->each(function($location){
            $person = $location->person()->save(factory(App\Person::class)->make([]));
            $this->sexo = $person->sexo;
            $person->User()->save(factory(App\User::class)->make());
            $person->medicalRecord()->save(factory(App\MedicalRecord::class)->make());
            $medicalConsultation = $person->medicalConsultation()->save(factory(App\MedicalConsultation::class)->make([
                'doctor_id' => $this->doctor(),
            ]));
            $this->speciality_id = App\Doctor::find($medicalConsultation->doctor_id)->speciality_id;
            $medicalConsultation->medicalReport()->save(factory(App\MedicalReport::class)->make([
                'disease_id' => $this->disease(),
            ])); 
        });

        
    }
}
