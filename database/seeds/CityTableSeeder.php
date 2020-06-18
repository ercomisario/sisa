<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\City::create([

            'name' => 'Cumaná',
            'municipality_id' => 1,            

        ]);
    }
}
