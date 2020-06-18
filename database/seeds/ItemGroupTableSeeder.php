<?php

use Illuminate\Database\Seeder;
use App\AnalysisType;
class ItemGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Analisis subjetivo
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Hábitos Psicobiológicos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Alcohol'],
            ['name' => 'Chimo'],
            ['name' => 'Deportes'],
            ['name' => 'Drogas'],
            ['name' => 'Ocupacion'],
            ['name' => 'Problemas Familiares'],
            ['name' => 'Rasgos Personales'],
            ['name' => 'Sexsuales'],
            ['name' => 'Siesta'],
            ['name' => 'Sueño'],
            ['name' => 'Tabaco'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Examen Funcional General')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Aumento de Peso'],
            ['name' => 'Fiebre'],
            ['name' => 'Nutricion'],
            ['name' => 'Pérdida de Peso'],
            ['name' => 'Sudores Nocturnos'],
            ['name' => 'Temblores'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Piel')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Clanosis'],
            ['name' => 'Edemas'],
            ['name' => 'Erupciones'],
            ['name' => 'Pigmentaciones'],
            ['name' => 'Prurito'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Cabeza')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Caída del Cabello'],
            ['name' => 'Cefalea'],
            ['name' => 'Mareos'],
            ['name' => 'Sincope'],
            ['name' => 'Traumas'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Ojos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Amaurosis'],
            ['name' => 'Anteojos'],
            ['name' => 'Cansancio Ocular'],
            ['name' => 'Diplopia'],
            ['name' => 'Dolor'],
            ['name' => 'Fotofobia'],
            ['name' => 'Lagrimeo'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Oidos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Dolor'],
            ['name' => 'Secreciones'],
            ['name' => 'Sordera'],
            ['name' => 'Tinnitus'],
            ['name' => 'Vertigo'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Nariz')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Catarros'],
            ['name' => 'Epistaxis'],
            ['name' => 'Obstrucciones'],
            ['name' => 'Secrecion Nasal'],
            ['name' => 'Sinusitis'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Boca')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Dientes'],
            ['name' => 'Halitosis'],
            ['name' => 'Mucosis'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Garganta')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Disfagia'],
            ['name' => 'Dolor'],
            ['name' => 'Ronquera'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Respiratorio')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Disnea'],
            ['name' => 'Dolor en el pecho'],
            ['name' => 'Esputos'],
            ['name' => 'Hemoptisis'],
            ['name' => 'Tos'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Osteomuscular')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Arthralgias'],
            ['name' => 'Debilidad'],
            ['name' => 'Dolores Oseos'],
            ['name' => 'Deformidades'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Cardiovascular')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Angustias'],
            ['name' => 'Disena'],
            ['name' => 'Dolor'],
            ['name' => 'Palpitaciones'],
            ['name' => 'Taquicardia'],
            ['name' => 'Vertigo'],
            ['name' => 'Claudicacion'],
            ['name' => 'Trastornos parestésicos'],
            ['name' => 'Varicosidades'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Gastrointestinal')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Apetito'],
            ['name' => 'Constipacion'],
            ['name' => 'Diarrea'],
            ['name' => 'Dolor'],
            ['name' => 'Heces tipo color mucosidad sangre'],
            ['name' => 'Eructos'],
            ['name' => 'Flatulencias'],
            ['name' => 'Hemorroides'],
            ['name' => 'Hernias'],
            ['name' => 'Malestar'],
            ['name' => 'Nauseas'],
            ['name' => 'Parasitos'],
            ['name' => 'Pirosis'],
            ['name' => 'Vomitos'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Henitouniranio')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Dolor'],
            ['name' => 'Enuresis'],
            ['name' => 'Hematuria'],
            ['name' => 'Incontinencia'],
            ['name' => 'Micciones'],
            ['name' => 'Nicturia'],
            ['name' => 'Pluria'],
            ['name' => 'Secreciones'],
            ['name' => 'Ulceras'],
            ['name' => 'Otros']
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Ginecologicos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Menarquia'],
            ['name' => 'Abortos'],
            ['name' => 'Partos'],
            ['name' => 'Dispareunias'],
            ['name' => 'Frigidez'],
            ['name' => 'Menopausia'],
            ['name' => 'Regla ripo cantidad dolor última regla'],
            ['name' => 'Flujo'],
            ['name' => 'Otros'],
        ]);
        $analysisGroup = AnalysisType::find(1)->analysisGroups()->where('name','Nervioso y mental')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Convulsiones'],
            ['name' => 'Estatica'],
            ['name' => 'Estado emotional'],
            ['name' => 'Marcha'],
            ['name' => 'Paralisis'],
            ['name' => 'Temblor'],
            ['name' => 'Tics'],
            ['name' => 'Tipo de personalidad'],
            ['name' => 'Otros'],
        ]);



        //--------------------------------------------------------------------------------------------
        //Analisis Objetivo
        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Examen Fisico')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Color'],
            ['name' => 'Humedad'],
            ['name' => 'Contextura'],
            ['name' => 'Temperatura'],
            ['name' => 'Pigmentacion'],
            ['name' => 'Equimosis'],
            ['name' => 'Cianosis'],
            ['name' => 'Petequias'],
            ['name' => 'Erupcion'],
            ['name' => 'Uñas'],
            ['name' => 'Nodulos'],
            ['name' => 'Vascularizacion'],
            ['name' => 'Cicatrices'],
            ['name' => 'Fistulas'],
            ['name' => 'Ulceras'],
            ['name' => 'Otros']
                              
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Cabeza')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Configuracion'],
            ['name' => 'Fontanelas'],
            ['name' => 'Reblandecimiento'],
            ['name' => 'Circunferencia'],
            ['name' => 'Dolor'],
            ['name' => 'Cabellos'],
            ['name' => 'Otros']
                                
        ]);
        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Ojos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Conjuntiva'],
            ['name' => 'Esclerotica'],
            ['name' => 'Cornea'],
            ['name' => 'Pupilas'],
            ['name' => 'Movimientos'],
            ['name' => 'Desviación'],
            ['name' => 'Nistagmus'],
            ['name' => 'Ptosis'],
            ['name' => 'Exoftalmos'],
            ['name' => 'Agudeza Visual'],
            ['name' => 'Oftalmoscopios'],
            ['name' => 'Otros']
                              
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Oidos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Pabellon'],
            ['name' => 'Conducto Externo'],
            ['name' => 'Timpano'],
            ['name' => 'Audicion'],
            ['name' => 'Secreciones'],
            ['name' => 'Mastoides'],
            ['name' => 'Dolor'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Nariz')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Fosas Nasales'],
            ['name' => 'Mucoa'],
            ['name' => 'Tabique'],
            ['name' => 'Mestos'],
            ['name' => 'Disfanoscopia'],
            ['name' => 'Sensibilidad de los Senos'],
            ['name' => 'Secrecion Nasal'],
            ['name' => 'Otros']
                           
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Boca')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Aliento'],
            ['name' => 'Labios'],
            ['name' => 'Dientes'],
            ['name' => 'Encias'],
            ['name' => 'Mucosas'],
            ['name' => 'Lengua'],
            ['name' => 'Conductos Salivares'],
            ['name' => 'Parálisis y trismo'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Faringe')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Amigdalas'],
            ['name' => 'Adenoides'],
            ['name' => 'Rino-faringe'],
            ['name' => 'Disfagia'],
            ['name' => 'Dolor'],
            ['name' => 'Otros']
                                 
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Cuello')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Movilidad'],
            ['name' => 'Ganglios'],
            ['name' => 'Tiroides'],
            ['name' => 'Vasos'],
            ['name' => 'Traquea'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Glanglios Linfaticos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Cervicales'],
            ['name' => 'Occipitales'],
            ['name' => 'Supraclaviculares'],
            ['name' => 'Axilares'],
            ['name' => 'Epitrocleares'],
            ['name' => 'Inquinales'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Torax')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Forma'],
            ['name' => 'Simetria'],
            ['name' => 'Expansion'],
            ['name' => 'Palpitacion'],
            ['name' => 'Respiracion'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Senos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Nodulos'],
            ['name' => 'Secreciones'],
            ['name' => 'Pezones'],
            ['name' => 'Otros']
                               
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Pulmones')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Fremito'],
            ['name' => 'Percusion'],
            ['name' => 'Auscultacion'],
            ['name' => 'Ruidos Adventicios'],
            ['name' => 'Pectoriloquia afona'],
            ['name' => 'Broncofonia'],
            ['name' => 'Otros']
                               
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Corazon')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Latidos De la punta'],
            ['name' => 'Thrill'],
            ['name' => 'Pulsacion'],
            ['name' => 'Ritmo'],
            ['name' => 'Ruidos'],
            ['name' => 'Galope'],
            ['name' => 'Frotes'],
            ['name' => 'Otros']
                               
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Vasos Sanguineos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Pulso'],
            ['name' => 'Paredes Vasculares'],
            ['name' => 'Caracteres'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Abdomen')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Aspecto'],
            ['name' => 'Circunferencia'],
            ['name' => 'Paristasis'],
            ['name' => 'Cicatrices'],
            ['name' => 'Defensa'],
            ['name' => 'Sensibilidad'],
            ['name' => 'Contractura'],
            ['name' => 'Tumoraciones'],
            ['name' => 'Ascitis'],
            ['name' => 'Higado'],
            ['name' => 'Riñones'],
            ['name' => 'Bazo'],
            ['name' => 'Hernias'],
            ['name' => 'Otros']
                                
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Genitales Masculinos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Cicatrices'],
            ['name' => 'Lesiones'],
            ['name' => 'Secreciones'],
            ['name' => 'Escroto'],
            ['name' => 'Epididimo'],
            ['name' => 'Deferentes'],
            ['name' => 'Testiculos'],
            ['name' => 'Prostata'],
            ['name' => 'Seminales'],
            ['name' => 'Otros']
                     
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Genitales Femeninos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Labios'],
            ['name' => 'Rariholino'],
            ['name' => 'Perine'],
            ['name' => 'Vagina'],
            ['name' => 'Cuello'],
            ['name' => 'Utero'],
            ['name' => 'Anexos'],
            ['name' => 'Parametrios'],
            ['name' => 'Douglas'],
            ['name' => 'Otros']
                     
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Recto')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Fisura'],
            ['name' => 'Fistulas'],
            ['name' => 'Hemorroides'],
            ['name' => 'Esfinter'],
            ['name' => 'Tumoraciones'],
            ['name' => 'Prolapso'],
            ['name' => 'Heces'],
            ['name' => 'Otros']
                     
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Huesos, Articulaciones, Músculos')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Deformidades'],
            ['name' => 'Inflamaciones'],
            ['name' => 'Rubicundez'],
            ['name' => 'Sensibilidad'],
            ['name' => 'Movimiento'],
            ['name' => 'Masas Musculares'],
            ['name' => 'Otros']
                       
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Extremidades')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Color'],
            ['name' => 'Edema'],
            ['name' => 'Temblor'],
            ['name' => 'Deformidades'],
            ['name' => 'Ulceras'],
            ['name' => 'Varices'],
            ['name' => 'Otros']
                               
        ]);

        $analysisGroup = AnalysisType::find(2)->analysisGroups()->where('name','Neurológico y Psíquico')->first();
        $analysisGroup->itemGroups()->createMany([
            ['name' => 'Sensibilidad Objetiva'],
            ['name' => 'Mobilidad'],
            ['name' => 'Reflectividad'],
            ['name' => 'Escritura'],
            ['name' => 'Troficos'],
            ['name' => 'Marcha'],
            ['name' => 'Romberg'],
            ['name' => 'Orientacion'],
            ['name' => 'Lenguaje'],
            ['name' => 'Coordinacion'],
            ['name' => 'Otros']
                     
        ]);

         
    }
}
