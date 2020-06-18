<?php

use Illuminate\Database\Seeder;

class MedicalRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\MedicalRecord::create([
            'person_id' => 3
        ]);

        App\MedicalRecord::create([
            'person_id' => 1
        ]);

        App\MedicalRecord::create([
            'person_id' => 2
        ]);

        App\MedicalRecord::create([
            'person_id' => 4
        ]);

        App\MedicalRecord::create([
            'person_id' => 5
        ]);

        App\MedicalRecord::create([
            'person_id' => 6
        ]);

        App\MedicalRecord::create([
            'person_id' => 7
        ]);

        App\MedicalRecord::create([
            'person_id' => 8
        ]);

        App\MedicalRecord::create([
            'person_id' => 9
        ]);

        App\MedicalRecord::create([
            'person_id' => 10
        ]);

        App\MedicalRecord::create([
            'person_id' => 11
        ]);

        App\MedicalRecord::create([
            'person_id' => 12
        ]);

        App\MedicalRecord::create([
            'person_id' => 13
        ]);
    }
}
