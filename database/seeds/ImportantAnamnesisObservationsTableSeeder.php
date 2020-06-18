<?php

use Illuminate\Database\Seeder;

class ImportantAnamnesisObservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicalCase = App\ClinicalCase::find(1);
        $medicalRecord_id = $clinicalCase->medicalRecord->id;
        $clinicalCase->anamnesisRecord()->first()->importantAnamnesisObservations()->createMany([
            ['description' => 'Aspirina, Polen, Camarones',
            'important_item_group_id' => 2,
            'medical_record_id' => $medicalRecord_id,
            ],
            ['description' => 'Emocional',
            'important_item_group_id' => 5,
            'medical_record_id' => $medicalRecord_id,
            ],
            ['description' => 'Frecuente',
            'important_item_group_id' => 14,
            'medical_record_id' => $medicalRecord_id,
            ],
            ['description' => 'Toxoide, Polio, Rubeola, Influensa tipo B',
            'important_item_group_id' => 35,
            'medical_record_id' => $medicalRecord_id,
            ],
        ]);
    }
}
