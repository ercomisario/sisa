<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class MedicalJustificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon;
        $clinicalCase = App\ClinicalCase::find(1);
        $clinicalCase->medicalJustification()->create([
                'start_date' => $date->now(),
                'end_date' => $date->addDays(5),
                'qr_code' => '1',
                'qr_path' => 'img/qrcodes/3-1.png',
                'description' => 'Permiso por hospitalizacion'
        ]);
    }
}
