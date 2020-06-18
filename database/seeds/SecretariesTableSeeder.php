<?php

use Illuminate\Database\Seeder;

class SecretariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Secretary::create([
            'person_id' => 4,
            'medical_center_id' => 1
            
        ]);
       

        App\Secretary::create([
            'person_id' => 9,
            'medical_center_id' => 1
            
        ]);
        

    }
}
