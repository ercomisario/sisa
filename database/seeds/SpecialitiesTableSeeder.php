<?php

use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\Speciality::create([
            'name' => 'MEDICINA GENERAL',
            'description' => 'LA MEDICINA GENERAL ES EL PRIMER NIVEL DE ATENCION MEDICA. EL MEDICO GENERAL ES EL PROFESIONAL CAPACITADO PARA REALIZAR EL DIAGNOSTICO Y TRATAMIENTO DE DIFERENTES PATOLOGIAS COMUNES DE MANERA AMBULATORIA Y DERIVAR AL ESPECIALISTA INDICADO CUANDO CORRESPONDA',
        ]);
        App\Speciality::create([
            'name' => 'TRAUMATOLOGIA',
            'description' => ' ',
        ]);
        App\Speciality::create([
            'name' => 'MEDICINA INTERNA',
            'description' => ' ',
        ]);
        App\Speciality::create([
            'name' => 'GINECOLOGIA',
            'description' => 'Parte de la medicina que se ocupa del aparato genital femenino y sus enfermedades, incluidas las glándulas mamarias.',
        ]);
        App\Speciality::create([
            'name' => 'CARDIOLOGIA',
            'description' => 'Parte de la medicina que se ocupa de la anatomía, la fisiología y las enfermedades del corazón.',
        ]);
        App\Speciality::create([
            'name' => 'GASTROENTEROLOGIA',
            'description' => 'ESTUDIO DEL APARATO DIGESTIVO,Y DE SUS TRASTORNOS',
        ]);
        App\Speciality::create([
            'name' => 'HEPATOLOGIA',
            'description' => 'ESTUDIO DEL HIGADO Y SUS ENFERMEDADES',
        ]);
        App\Speciality::create([
            'name' => 'NEUMOLOGIA',
            'description' => 'PARTE DE LA MEDICINA QUE SE OCUPA DEL TRATAMIENTO Y LAS ENFERMEDADES DE LOS PULMONES Y LAS VIAS RESPIRATORIAS',
        ]);
        App\Speciality::create([
            'name' => 'INFECTOLOGIA',
            'description' => 'ESPECIALIDAD MEDICA QUE SE ENCARGA DEL ESTUDIO, LA PREVENCION, EL DIAGNOSTICO Y EL TRATAMIENTO DE LAS ENFERMEDADES PRODUCIDAS POR AGENTES INFECCIOSOS (BACTERIAS, VIRUS, HONGOS, PARASITOS Y PRIONES)',
        ]);
        App\Speciality::create([
            'name' => 'ENDOCRINOLOGIA',
            'description' => 'ES UNA DISCIPLINA DE LA MEDICINA QUE ESTUDIA EL SISTEMA ENDOCRINO Y LAS ENFERMEDADES PROVOCADAS POR UN FUNCIONAMIENTO INADECUADO DEL MISMO. ALGUNAS DE LAS ENFERMEDADES DE LAS QUE SE OCUPA LA ENDOCRINOLOGIA SON LA DIABETES MELLITUS PROVOCADA POR DEFICIENCIA DE INSULINA O RESISTENCIA A SU ACCION, EL HIPOTIROIDISMO POR DEFICIT EN LA PRODUCCION DE HORMONAS TIROIDEAS, EL HIPERTIROIDISMO POR EXCESIVA PRODUCCION DE HORMONAS TIROIDEAS Y LA ENFERMEDAD DE CUSHING DEBIDA GENERALMENTE A EXCESIVA PRODUCCION DE CORTISOL POR LAS GLANDULAS SUPRARRENALES',
        ]);
        App\Speciality::create([
            'name' => 'PERINATOLOGIA',
            'description' => 'RAMA DE LA OBSTETRICIA Y PEDIATRIA QUE SE DEDICA AL ESTUDIO Y AL TRATAMIENTO DE LA MADRE Y EL NIÑO EN LOS ULTIMOS ESTADIOS DE LA GESTACION Y LOS PRIMEROS DIAS DESPUES DEL NACIMIENTO',
        ]);
        App\Speciality::create([
            'name' => 'NEUROLOGIA',
            'description' => 'ES LA ESPECIALIDAD MEDICA QUE ESTUDIA LA ESTRUCTURA, FUNCION Y DESARROLLO DEL SISTEMA NERVIOSO (CENTRAL, PERIFERICO Y AUTONOMO) Y MUSCULAR EN ESTADO NORMAL Y PATOLOGICO, UTILIZANDO TODAS LAS TECNICAS CLINICAS E INSTRUMENTALES DE ESTUDIO, DIAGNOSTICO Y TRATAMIENTO ACTUALMENTE EN USO O QUE PUEDAN DESARROLLARSE EN EL FUTURO',
        ]);
        App\Speciality::create([
            'name' => 'ONCOLOGIA',
            'description' => 'ES LA ESPECIALIDAD MEDICA QUE ESTUDIA Y TRATA LAS NEOPLASIAS; TUMORES BENIGNOS Y MALIGNOS, PERO CON ESPECIAL ATENCION A LOS TUMORES MALIGNOS O CANCER',
        ]);
        App\Speciality::create([
            'name' => 'PSIQUIATRIA',
            'description' => 'ES LA ESPECIALIDAD MEDICA DEDICADA AL ESTUDIO DE LOS TRASTORNOS MENTALES DE ORIGEN GENETICO O NEUROLOGICO CON EL OBJETIVO DE PREVENIR, EVALUAR, DIAGNOSTICAR, TRATAR Y REHABILITAR A LAS PERSONAS CON TRASTORNOS MENTALES Y ASEGURAR LA AUTONOMIA Y LA ADAPTACION DEL INDIVIDUO A LAS CONDICIONES DE SU EXISTENCIA',
        ]);


    }
}
