<?php

use Illuminate\Database\Seeder;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Shift::create([
            'name' => 'Mañana',
            'start_time'=> '07:00:00',
            'end_time'=> '13:00:00',
            'monday'=> true,
            'tuesday'=> true,
            'wednesday'=> true,
            'thursday'=> true,
            'friday'=> true,
        ]);
        
        App\Shift::create([
            'name' => 'Tarde',
            'start_time'=> '13:00:00',
            'end_time'=> '19:00:00',
            'monday'=> true,
            'tuesday'=> true,
            'wednesday'=> true,
            'thursday'=> true,
            'friday'=> true,
        ]);
        App\Shift::create([
            'name' => 'Nocturno',
            'start_time'=> '19:00:00',
            'end_time'=> '07:00:00',
            'monday'=> true,
            'wednesday'=> true,
            'friday'=> true,
        ]);
    }
}
