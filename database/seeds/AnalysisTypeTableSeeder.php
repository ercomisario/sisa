<?php

use Illuminate\Database\Seeder;

class AnalysisTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\AnalysisType::create(
            ['name' => 'Análisis Subjetivo']           
        );
        App\AnalysisType::create(
            ['name' => 'Análisis Objetivo']            
        );
    }
}
