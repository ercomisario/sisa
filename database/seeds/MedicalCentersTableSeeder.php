<?php

use Illuminate\Database\Seeder;

class MedicalCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\MedicalCenter::create([
            'name' => 'Hospital Universitario Antonio Patricio de Alcalá',
            'phone' => '02934563124',
            'email' => 'HUAPA@mpps.gob.ve',
            'location_id' => '7',
        ]);

        App\MedicalCenter::create([
            'name' => 'Ambulatorio Urbano Brasil',
            'phone' => '02934563124',
            'email' => 'AMBUBRASIL@mpps.gob.ve',
            'location_id' => '12',
        ]);

        App\MedicalCenter::create([
            'name' => 'Ambulatorio Urbano Cantarrana',
            'phone' => '02934322466',
            'email' => 'AMBUCANTARRANA@mpps.gob.ve',
            'location_id' => '2',
        ]);
    }
}
