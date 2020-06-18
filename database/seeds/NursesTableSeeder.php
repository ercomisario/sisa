<?php

use Illuminate\Database\Seeder;

class NursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Nurse::create([
            'person_id' => '1',
            'license' => '54321',
        ]);
        $nurse = App\Nurse::find(1);
        $nurse->medicalCenters()->attach(1);

        App\Nurse::create([
            'person_id' => '8',
            'license' => '09876',
        ]);
        $nurse = App\Nurse::find(1);
        $nurse->medicalCenters()->attach(1);
    }
}
