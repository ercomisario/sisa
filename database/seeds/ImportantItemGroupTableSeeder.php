<?php

use Illuminate\Database\Seeder;
use App\AnalysisType;

class ImportantItemGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Analisis subjetivo
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Antecedentes Personales')->first();
        $analysisGroup->importantItemGroups()->createMany([
            ['name' => 'Adenitis'],
            ['name' => 'Alergia'],
            ['name' => 'Amigdalitis'],
            ['name' => 'Artritis'],
            ['name' => 'Asma'],
            ['name' => 'Bilharziasis'],
            ['name' => 'Blenorragia'],
            ['name' => 'Bronquitis'],
            ['name' => 'Buba'],
            ['name' => 'Catarros'],
            ['name' => 'Chagas'],
            ['name' => 'Chancros'],
            ['name' => 'Difteria'],
            ['name' => 'Diarrea'],
            ['name' => 'Hancen'],
            ['name' => 'Influensa'],
            ['name' => 'Lechina'],
            ['name' => 'Necatoriasis'],
            ['name' => 'Neumonía'],
            ['name' => 'Otitis'],
            ['name' => 'Paludismo'],
            ['name' => 'Parasitos'],
            ['name' => 'Parotiditis'],
            ['name' => 'Pleuresia'],
            ['name' => 'Quirurgicos'],
            ['name' => 'Rinofaringitis'],
            ['name' => 'Rubeola'],
            ['name' => 'Sarampion'],
            ['name' => 'Sifilis'],
            ['name' => 'Sindromes Disentéricos'],
            ['name' => 'Tuberculosis'],
            ['name' => 'Tifoidea'],
            ['name' => 'Tosferina'],
            ['name' => 'Traumatismo'],
            ['name' => 'Vacunación'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Antecedentes Familiares')->first();
        $analysisGroup->importantItemGroups()->createMany([
            ['name' => 'Alergia'],
            ['name' => 'Artritis'],
            ['name' => 'Asma'],
            ['name' => 'Cancer'],
            ['name' => 'Cardiovasculares'],
            ['name' => 'Diabetes'],
            ['name' => 'Enfermedades Digestivas'],
            ['name' => 'Enfermedades Renales'],
            ['name' => 'Intoxicaciones'],
            ['name' => 'Neuromentales'],
            ['name' => 'Sifilis'],
            ['name' => 'Tuberculosis'],
            ['name' => 'Otros']
        ]);
    }
}
