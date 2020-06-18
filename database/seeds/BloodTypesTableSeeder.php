<?php

use Illuminate\Database\Seeder;
use App\BloodType;

class BloodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodType::create([
            'name' => 'O+'
        ]);
        BloodType::create([
            'name' => 'A+'
        ]);
        BloodType::create([
            'name' => 'B+'
        ]);
        BloodType::create([
            'name' => 'AB+'
        ]);
        BloodType::create([
            'name' => 'O-'
        ]);
        BloodType::create([
            'name' => 'A-'
        ]);
        BloodType::create([
            'name' => 'B-'
        ]);
        BloodType::create([
            'name' => 'AB-'
        ]);        
    }
}
