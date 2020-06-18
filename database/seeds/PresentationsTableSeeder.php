<?php

use Illuminate\Database\Seeder;

class PresentationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //via de administracion
        App\AdministerRoute::create([

            'name' => 'Oral',
        ]);
        App\AdministerRoute::create([

            'name' => 'Intramuscular',
        ]);
        App\AdministerRoute::create([

            'name' => 'Intravenoso',
        ]);
        App\AdministerRoute::create([

            'name' => 'Rectal',
        ]);
        App\AdministerRoute::create([

            'name' => 'Sublingual',
        ]);
        App\AdministerRoute::create([

            'name' => 'Transdérmica',
        ]);
        App\AdministerRoute::create([

            'name' => 'Cutanea',
        ]);
        
        //Tipo de presentación

        App\PresentationType::create([
        
            'name' => 'Tableta',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Capsula',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Comprimido',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Gragea',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Pastilla',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Tableta Soluble',
            'unit_measurement' => 'mg',
        ]);App\PresentationType::create([
        
            'name' => 'Suspension Oral',
            'unit_measurement' => 'ml',
        ]);
        App\PresentationType::create([
        
            'name' => 'Solucion Inyectable',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Supositorio',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Tableta Sublingual',
            'unit_measurement' => 'mg',
        ]);
        App\PresentationType::create([
        
            'name' => 'Parche',
            'unit_measurement' => 'mg',
        ]);

        App\PresentationType::create([
        
            'name' => 'Crema',
            'unit_measurement' => 'mg',
        ]);

        //Componentes y Presentación

        $componente = App\Component::create([
            'name' => 'ÁCIDO ACETILSALICÍLICO',
            'indication'=> 'Artritis reumatoide,Osteoartritis,Espondilitis,anquilosante,Fiebre reumática aguda,Dolor o fiebre.',
            'contraindication' => 'Hipersensibilidad al fármaco,úlcera péptica o gastritis activas,hipoprotrombinemia,niños menores de 6 años',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '100',
                'maximum_quantity'=> '1000',
                'description'=>'Cada tableta contiene: Ácido acetilsalicílico 500 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
            [   'minimum_quantity' => '100',
                'maximum_quantity'=> '1000',
                'description'=>'Cada tableta soluble contiene: Ácido acetilsalicílico 300 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '6',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'IBUPROFENO',
            'indication'=> 'Dolor de leve a moderado,Fiebre',
            'contraindication' => 'Hipersensibilidad al fármaco',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '200',
                'maximum_quantity'=> '600',
                'description'=>'La tableta biene en presentaciones de: Ibuprofeno 200 mg, 400 mg y 600 mg.',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
            [   'minimum_quantity' => '2.5',
                'maximum_quantity'=> '10',
                'description'=>'Cada 100 ml contienen: Ibuprofeno 2 g',
                'administer_route_id' => '1',
                'presentation_type_id' => '7',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'METAMIZOL SÓDICO',
            'indication'=> 'Fiebre,Dolor agudo o crónico,Algunos casos de dolor visceral',
            'contraindication' => 'Hipersensibilidad al fármaco y a pirazolonas,Insuficiencia renal o hepática,Discrasias sanguíneas, Úlcera duodena',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '500',
                'maximum_quantity'=> '1000',
                'description'=>'Cada comprimido contiene: Metamizol sódico 500 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '3',
            ],
            [   'minimum_quantity' => '500',
                'maximum_quantity'=> '1000',
                'description'=>'Cada ampolleta contiene: Metamizol sódico 1 g',
                'administer_route_id' => '2',
                'presentation_type_id' => '8',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'PARACETAMOL',
            'indication'=> 'Fiebre,Dolor agudo o crónico',
            'contraindication' => 'Hipersensibilidad al fármaco,Disfunción hepática e insuficiencia renal grave',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '250',
                'maximum_quantity'=> '500',
                'description'=>'Cada tableta contiene: Paracetamol 500 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
            [   'minimum_quantity' => '100',
                'maximum_quantity'=> '600',
                'description'=>'Cada supositorio contiene: Paracetamol 100 mg y 300 mg ',
                'administer_route_id' => '4',
                'presentation_type_id' => '9',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'BUPRENORFINA',
            'indication'=> 'Dolor de intensidad moderada a severa',
            'contraindication' => 'Hipersensibilidad al fármaco,Hipertensión intracraneal,Daño hepático o renal, Depresión del sistema nervioso central,Hipertrofia prostática',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '0.1',
                'maximum_quantity'=> '0.4',
                'description'=>'Cada tableta sublingual contiene: Clorhidrato de buprenorfina equivalente a 0.2 mg de buprenorfina',
                'administer_route_id' => '5',
                'presentation_type_id' => '10',
            ],
            [   'minimum_quantity' => '0.15',
                'maximum_quantity'=> '0.6',
                'description'=>'Cada ampolleta contiene: Clorhidrato de buprenorfina equivalente a 0.3 mg de buprenorfina',
                'administer_route_id' => '3',
                'presentation_type_id' => '8',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'AMOXICILINA',
            'indication'=> 'Infecciones por bacterias gram negativas susceptibles',
            'contraindication' => 'Hipersensibilidad a las penicilinas o a las cefalosporinas',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '100',
                'maximum_quantity'=> '1000',
                'description'=>'Cada cápsula contiene: Amoxicilina trihidratada equivalente a 500 mg de amoxicilina',
                'administer_route_id' => '1',
                'presentation_type_id' => '2',
            ],
            [   'minimum_quantity' => '100',
                'maximum_quantity'=> '1000',
                'description'=>'Cada frasco con polvo contiene: Amoxicilina trihidratada equivalente a 7.5 g de amoxicilina',
                'administer_route_id' => '1',
                'presentation_type_id' => '7',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'AMPICILINA',
            'indication'=> 'Infecciones por bacterias gram positivas y gram negativas susceptibles',
            'contraindication' => 'Hipersensibilidad al fármaco',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '250',
                'maximum_quantity'=> '1000',
                'description'=>'Cada tableta contiene: Ampicilina anhidra o ampicilina trihidratada equivalente a 500 mg de ampicilina',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
            [   'minimum_quantity' => '2.5',
                'maximum_quantity'=> '5',
                'description'=>'Cada 5 ml contienen: Ampicilina trihidratada equivalente a 250 mg de ampicilina',
                'administer_route_id' => '1',
                'presentation_type_id' => '7',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'CAPTOPRIL',
            'indication'=> 'Hipertensión arterial sistémica,Insuficiencia cardiaca',
            'contraindication' => 'Hipersensibilidad a captopril,Insuficiencia renal,Inmunosupresión,Hiperpotasemia y tos crónica',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '5',
                'maximum_quantity'=> '50',
                'description'=>'Cada tableta contiene: Captopril 25 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
        ]);
        $componente = App\Component::create([
            'name' => 'HIDROCORTISONA',
            'indication'=> 'Insuficiencia suprarrenal,Estados de choque,Autoinmunidad,“Status” asmático',
            'contraindication' => 'Hipersensibilidad al fármaco,Micosis sistémica.',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '10',
                'maximum_quantity'=> '2000',
                'description'=>'Cada frasco ámpula contiene: Succinato sódico de hidrocortisona equivalente a 100 mg de hidrocortisona.',
                'administer_route_id' => '3',
                'presentation_type_id' => '8',
            ],
        ]);

        $componente = App\Component::create([
            'name' => 'LORATADINA',
            'indication'=> 'Reacciones de hipersensibilidad inmediata',
            'contraindication' => 'Hipersensibilidad al fármaco',
        ]);
        $componente->presentations()->createMany([
            [   'minimum_quantity' => '5',
                'maximum_quantity'=> '10',
                'description'=>'Cada tableta o gragea contienen: Loratadina 10 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '4',
            ],
            [   'minimum_quantity' => '5',
                'maximum_quantity'=> '10',
                'description'=>'Cada tableta o gragea contienen: Loratadina 10 mg',
                'administer_route_id' => '1',
                'presentation_type_id' => '1',
            ],
        ]);

    }
}
