<?php

use Illuminate\Database\Seeder;
use App\AnalysisType;
class AnalysisGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analysisType = AnalysisType::find(1);
        $analysisType->analysisGroups()->createMany([
            ['name' => 'Antecedentes Personales'],
            ['name' => 'Antecedentes Familiares'],
            ['name' => 'Hábitos Psicobiológicos'],
            ['name' => 'Examen Funcional General'],
            ['name' => 'Piel'],
            ['name' => 'Cabeza'],
            ['name' => 'Ojos'],
            ['name' => 'Oidos'],
            ['name' => 'Nariz'],
            ['name' => 'Boca'],
            ['name' => 'Garganta'],
            ['name' => 'Respiratorio'],
            ['name' => 'Osteomuscular'],
            ['name' => 'Cardiovascular'],
            ['name' => 'Gastrointestinal'],
            ['name' => 'Henitouniranio'],
            ['name' => 'Ginecologicos'],
            ['name' => 'Nervioso y mental']
        ]);
        
        $analysisType = AnalysisType::find(2);
        $analysisType->analysisGroups()->createMany([
            ['name' => 'Examen Fisico'],
            ['name' => 'Cabeza'],
            ['name' => 'Ojos'],
            ['name' => 'Oidos'],
            ['name' => 'Nariz'],
            ['name' => 'Boca'],
            ['name' => 'Faringe'],
            ['name' => 'Cuello'],
            ['name' => 'Glanglios Linfaticos'],
            ['name' => 'Torax'],
            ['name' => 'Senos'],
            ['name' => 'Pulmones'],
            ['name' => 'Corazon'],
            ['name' => 'Vasos Sanguineos'],
            ['name' => 'Abdomen'],
            ['name' => 'Genitales Masculinos'],
            ['name' => 'Genitales Femeninos'],
            ['name' => 'Recto'],
            ['name' => 'Huesos, Articulaciones, Músculos'],
            ['name' => 'Extremidades'],
            ['name' => 'Neurológico y Psíquico']
        ]);
    }
}
