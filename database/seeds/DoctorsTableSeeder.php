<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $doctor = App\Doctor::create([
            'person_id' => '2',
            'license' => '12345',
            'speciality_id' => '1',
        ]);
        
        $doctor->medicalCenters()->attach(1,['shift_id'=> 1]); 

        $doctor = App\Doctor::create([
            'person_id' => '5',
            'license' => '67890',
            'speciality_id' => '5',
        ]);
       
        $doctor->medicalCenters()->attach(1,['shift_id'=> '2']);

        $doctor = App\Doctor::create([
            'person_id' => '7',
            'license' => '67891',
            'speciality_id' => '4',
        ]);
       
        $doctor->medicalCenters()->attach(1,['shift_id'=> '1']);
    }
}
