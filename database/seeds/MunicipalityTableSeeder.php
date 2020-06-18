<?php

use Illuminate\Database\Seeder;

class MunicipalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Municipality::create([
            'name' => 'Sucre',
            'state_id' => 1
        ]);
    }
}
