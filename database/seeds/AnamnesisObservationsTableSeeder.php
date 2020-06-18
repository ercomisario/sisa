<?php

use Illuminate\Database\Seeder;

class AnamnesisObservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //anamnesis del caso clinico 1
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->anamnesisRecord()->first()->anamnesisObservations()->createMany([
            ['description' => 'Muy frecuente',
            'item_group_id' => 1],
            ['description' => 'Diariamente',
            'item_group_id' => 11],
            ['description' => 'Normal',
            'item_group_id' => 142],
            ['description' => 'Problemas de migraña',
            'item_group_id' => 146],
            ['description' => 'Aspecto sano',
            'item_group_id' => 147],
            ['description' => 'Mucosidad abundante',
            'item_group_id' => 175],
        ]);
    }
}
