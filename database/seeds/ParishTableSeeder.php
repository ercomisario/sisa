<?php

use Illuminate\Database\Seeder;

class ParishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Parish::create([

            'name' => 'Santa Ines',
            'city_id' => 1,
        ]);

        App\Parish::create([

            'name' => 'Valentin Valiente',
            'city_id' => 1,
        ]);

        App\Parish::create([

            'name' => 'Altagracia',
            'city_id' => 1,
        ]);

        App\Parish::create([

            'name' => 'Ayacucho',
            'city_id' => 1,
        ]);

        
    }
}
