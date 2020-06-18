<?php

use Illuminate\Database\Seeder;
use App\DiseaseClasification;
use App\Speciality;

class DeseaseClasificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        $speciality = Speciality::where('name','GINECOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Trastornos inflamatorios del aparato genital femenino',
            'description' => 'Enfermedades del aparato genital femenino',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Vulvitis aguda',
             'description' => '',
            ],
            ['name' => 'Vulvitis subaguda, crónica o recurrente',
             'description' => '',
            ],
            ['name' => 'Absceso de la vulva',
             'description' => 'Enfermedad vulvar causada por una infección bacteriana, viral o micótica. Se caracteriza por acumulación focal de material purulento en la vulva. Puede cursar con dolor e inflamación de la vulva, dispareunia (dolor durante el coito) o fiebre. El diagnóstico de confirmación es mediante la exploración ginecológica.',
            ],
            ['name' => 'Ulcera genital de la vulva ',
             'description' => 'Ulceración de la vulva de causa desconocida o incierta, pero con sospecha de infección de transmisión sexual; sobre todo, herpes simple, sífilis primaria o chancroide. Se trata de un diagnóstico provisional que debe modificarse una vez conocida la causa de la ulceración.',
            ],
            ['name' => 'Ulceración o inflamación vulvovaginal',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Trastornos no inflamatorios del aparato genital femenino',
            'description' => 'Cualquier trastorno del aparato genital femenino caracterizado por alteraciones patológicas que no sean de tipo inflamatorio.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Vaginitis aguda',
             'description' => '',
            ],
            ['name' => 'Vaginitis inflamatoria',
             'description' => 'Síndrome clínico caracterizado por exudado vaginal difuso, exfoliación de las células del epiteliales y abundante flujo vaginal purulento, asociado a ardor o irritación vulvovaginal y dispareunia; en ocasiones, también eritema vulvovaginal y manchas equimóticas.',
            ],
            ['name' => 'Vaginitis subaguda o crónica',
             'description' => 'Candidosis vulvovaginal crónica, caracterizada por síntomas irritativos crónicos del vestíbulo, la vulva y la vagina, con ardor que sustituye al prurito como síntoma principal. Diagnóstico diferencial con la dermatitis atópica crónica y la vulvovaginitis atrófica.',
            ],
            ['name' => 'Cervicitis',
             'description' => '',
            ],
            ['name' => 'Salpingitis y ooforitis aguda',
             'description' => ' Inflamación de la trompa de Falopio y del ovario, caracterizada por una respuesta inflamatoria típica (enrojecimiento y edema). Por lo general, se manifiesta por dolor abdominal bajo y dolor a la palpación, fiebre, taquicardia, hipermenorrea o metrorragia. Puede resolverse o provocar fibrosis, hidrosalpinge, piosalpinge o formación de quistes.',
            ],
            ['name' => 'Salpingitis y ooforitis crónica',
             'description' => '',
            ],
            ['name' => 'Endometriosis',
             'description' => 'Enfermedad del útero, con frecuencia idiopática, caracterizada por crecimiento ectópico de tejido endometrial funcional fuera de la cavidad uterina. Puede asociarse a tejido vestigial residual de los conductos de Wolff o de Müller, o fragmentos de endometrio que refluyen hacia la cavidad peritoneal durante la menstruación. Puede cursar también con dismenorrea, dispareunia, dolor pélvico no menstrual, infertilidad o alteraciones de la menstruación, o puede ser asintomática. El diagnóstico de confirmación es mediante identificación laparoscópica e histológica de los fragmentos ectópicos.',
            ],
            ['name' => 'Adenomiosis',
             'description' => 'Enfermedad del útero caracterizada por crecimiento de tejido endometrial en el miometrio, hipertrofia del miometrio y hemorragia menstrual abundante o prolongada, dismenorrea, dispareunia, metrorragia intermenstrual o infertilidad; también puede ser asintomática. El diagnóstico de confirmación es por examen histopatológico o ecografía.',
            ],
            ['name' => 'Dispareunia',
             'description' => 'Síntoma del aparato genital femenino causado por determinantes físicos y caracterizado por molestia o dolor genital recurrente que aparece antes, durante o después del coito o de la penetración vaginal superficial o profunda, relacionado con una causa física identificable a excepción de la falta de lubricación. El diagnóstico de confirmación es por evaluación médica de las causas físicas.',
            ],
            ['name' => 'Neoplasia intraepitelial vulvar no especificada de otra manera',
             'description' => 'Enfermedad de la vulva caracterizada por lesión de las células escamosas intraepiteliales vulvares que lleva a un grado no especificado de displasia y diversos grados de atipia celular. Se asocia a tabaquismo, inmunodepresión, virus del papiloma humano, irritación vulvar crónica o virus del herpes simple de tipo 2. El diagnóstico de confirmación es por biopsia tisular.',
            ],
            ['name' => 'Hipertrofia de vulva',
             'description' => 'Afección de la vulva, frecuentemente idiopática, caracterizada por aumento de tamaño o engrosamiento de los tejidos de todos o parte de los genitales externos femeninos (clítoris, labios mayores, vestíbulo de la vagina, glándulas). Puede cursar también con una mancha blanquecina, prurito, dolor o ardor en la piel.',
            ],
            ['name' => 'Quiste vulvar',
             'description' => 'Saco cerrado y lleno de líquido ubicado en el tejido vulvar o sobre él.',
            ],
            ['name' => 'Pólipo de la vagina',
             'description' => '',
            ],
            ['name' => 'Hematocolpos',
             'description' => 'Afección vaginal causada por una obstrucción de la salida vaginal. Se caracteriza por la presencia de sangre en la vagina.',
            ],
            ['name' => 'Cuerpo extraño vaginal',
             'description' => 'Afección vaginal causada por uno o más cuerpos extraños alojados en la vagina. Se caracteriza por vaginitis, hemorragia vaginal, flujo vaginal maloliente o purulento, dolor abdominal y dolor suprapúbico. Puede cursar también con disuria o infección.',
            ],
            ['name' => 'Hematoma vaginal',
             'description' => 'Afección vaginal causada por traumatismo (habitualmente posterior al parto), abuso sexual o impacto enérgico. Se caracteriza por acumulación localizada de sangre extravasada sanguíneos y equimosis importante. Puede cursar también con dolor, inflamación, equimosis y retención urinaria.',
            ],
            ['name' => 'Leucoplasia de vagina',
             'description' => 'Afección de la vagina causada por hiperqueratinización de las células epiteliales debido a una infección por virus del papiloma humano (VPH), traumatismo crónico, radioterapia o lesiones malignas o premalignas. Se caracteriza por una placa de color blanco, amarillo blanquecino o gris en la mucosa vaginal',
            ],
            ['name' => 'LEUCORREA NO ESPECIFICADA',
             'description' => '',
            ], 

        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Hemorragia uterina o vaginal anormal',
            'description' => 'Afección del aparato genital femenino causada por trastornos hormonales, cambios de peso, neoplasias o medicamentos. Se caracterizada por desprendimiento excesivo o irregular de la mucosa uterina (endometrio) o hemorragia vaginal durante o entre los ciclos menstruales.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Amenorrea primaria',
             'description' => 'Ausencia de menstruación a los 14 años de edad en ausencia de crecimiento normal o desarrollo de caracteres sexuales secundarios; o bien ausencia de menstruación a los 16 años de edad con independencia de la presencia de crecimiento normal o desarrollo de caracteres sexuales secundarios.',
            ],
            ['name' => 'Amenorrea secundaria',
             'description' => 'Ausencia de menstruación en una mujer que ha tenido previamente ciclos menstruales, durante un intervalo de tiempo equivalente como mínimo a la suma de los tres últimos ciclos menstruales, o 6 meses.',
            ],
            ['name' => 'Amenorrea de la lactancia',
             'description' => 'Afección del aparato genital femenino causada por trastornos hormonales asociados a la lactancia materna. Se caracteriza por la suspensión del ciclo menstrual durante más de 3 a 9 meses.',
            ],
            ['name' => 'Sangrado poscoital o por contacto',
             'description' => 'Afección del aparato genital femenino causada por infección, ectropión de cuello uterino, pólipos cervicales o endometriales, cáncer o traumatismo del cuello uterino o de la vagina y caracterizada por sangrado no menstrual tras mantener relaciones sexuales. El diagnóstico de confirmación es mediante imagen transvaginal para identificar cualquier anomalía estructural.',
            ],
            ['name' => 'Menstruación excesiva con ciclo irregular',
             'description' => '',
            ],
            ['name' => 'Sangrado anovulatorio',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Trastornos menopáusicos o perimenopáusicos',
            'description' => 'Cualquier trastorno femenino caracterizado por cambios patológicos durante la menopausia o el período perimenopáusico.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Menopausia',
             'description' => 'Afección femenina causada por pérdida de la función folicular ovárica y disminución de las concentraciones de estrógenos en la sangre circulante. Se caracteriza por cese de la menstruación, sofocos, alteraciones atróficas genitales, efectos psicofisiológicos y disminución de la masa ósea. El diagnóstico de confirmación es mediante anamnesis para determinar los efectos psicofisiológicos, como la presencia de amenorrea, y detección de hipoestrogenemia y FSH sérica elevada en una muestra de sangre.',
            ],
            ['name' => 'Hemorragia uterina posmenopáusica',
             'description' => 'Afección del aparato genital femenino causada por pólipos, atrofia endometrial, hiperplasia o cáncer. Se caracteriza por hemorragia uterina anormal con posterioridad a la menopausia.',
            ],
            ['name' => 'Vaginitis atrófica posmenopáusica',
             'description' => 'Afección de la vagina causada por disminución de las concentraciones de estrógeno durante la menopausia. Se caracteriza por inflamación de la vagina y de las vías urinarias externas, adelgazamiento y sequedad de los tejidos vaginales, disminución de la lubricación, ardor o sequedad vaginal, acortamiento y endurecimiento de la cavidad vaginal, o incontinencia urinaria con posterioridad a la menopausia.',
            ],
            ['name' => 'Estados asociados a menopausia artificial',
             'description' => 'Cualquier afección causada por el cese artificial de la menstruación inducida por efectos quirúrgicos o farmacológicos.',
            ],
            ['name' => 'Sofocos de la menopausia',
             'description' => 'Afección femenina causada por los cambios hormonales asociados a la menopausia. Se caracteriza por períodos recurrentes y transitorios de sofocos, sudación y sensación generalizada de calor. Puede cursar también con palpitaciones, ansiedad o períodos de calor seguido de escalofríos.',
            ],
            ['name' => 'Osteoporosis menopaúsica',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Infertilidad femenina',
            'description' => 'Enfermedad del aparato reproductor femenino caracterizada por la incapacidad de lograr un embarazo tras 12 meses o más de relaciones sexuales sin protección.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Infertilidad femenina primaria de origen uterino',
             'description' => 'Infertilidad femenina causada por alteraciones uterinas del endometrio o del miometrio, con descripción más detallada clasificada en otra parte; p. ej., bajo infecciones genitourinarias, enfermedades de transmisión sexual o enfermedades ginecológicas benignas no inflamatorias.',
            ],
            ['name' => 'Infertilidad femenina primaria de origen tubárico',
             'description' => 'Infertilidad femenina causada por disfunción de una o ambas trompas de Falopio, por lo general relacionada con adherencias pélvicas o tras una cirugía pélvica, con o sin hidrosalpinge.',
            ],
            ['name' => 'Infertilidad femenina secundaria de origen uterino',
             'description' => '',
            ],
            ['name' => 'Infertilidad femenina secundaria de origen tubárico',
             'description' => '',
            ],

        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES DEL APARATO GENITOURINARIO',
            'description' => 'CUALQUIER ENFERMEDAD CARACTERIZADA POR ALTERACIONES PATOLOGICAS DEL APARATO GENITOURINARIO',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'ENFERMEDAD RENAL',
             'description' => 'CUALQUIER ENFERMEDAD CARACTERIZADA POR ALTERACIONES PATOLOGICAS DEL APARATO GENITOURINARIO',
            ],
            
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'MICOSIS',
            'description' => 'ENFERMEDAD INFECCIOSA PRODUCIDA POR HONGOS MICROSCOPICOS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'CANDIDIASIS GENITAL',
             'description' => 'CANDIDOSIS DE LOS GENITALES EXTERNOS FEMENINOS. SE CARACTERIZA POR PRURITO O ARDOR EN LOS GENITALES EXTERNOS Y FLUJO VAGINAL. SE TRANSMITE POR DISEMINACION ENDOGENA O POR CONTACTO SEXUAL. SUELE CONFIRMARSE POR DETECCION DE LAS CANDIDAS EN UN FROTIS VAGINAL',
            ],
            
        ]);



        
        $speciality = Speciality::where('name','CARDIOLOGIA')->first();


        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Enfermedades hipertensivas',
            'description' => 'Aunque existe una asociación continua entre una presión arterial (PA) elevada y un mayor riesgo de enfermedad cardiovascular, es útil clasificar los distintos niveles de PA para fines de las decisiones medicosanitarias. Las directrices más recientes clasifican la hipertensión sistémica en 4 niveles sobre la base de la PA promedio medida en un contexto médico asistencial (en un consultorio): • Normal: PA sistólica <120 mmHg y presión arterial diastólica <80 mmHg • Elevada: PA sistólica 120-129 mmHg y presión arterial diastólica <80 mmHg • Etapa 1 de hipertensión: PA sistólica 130-139 mmHg o PA diastólica 80-89 mmHg • Etapa 2 de hipertensión: PA sistólica de 140 mmHg o más, PA diastólica de 90 mmHg o más. En los niños, la hipertensión sistémica se define como una presión arterial sistólica o diastólica promedio igual o superior al percentil 95 que corresponda al sexo, la edad y la estatura del niño. Las complicaciones de la hipertensión no controlada o prolongada incluyen daño a los vasos sanguíneos, corazón, riñones y cerebro.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Hipertensión esencial',
             'description' => 'La hipertensión esencial (primaria), que representa el 95% de todos los casos de hipertensión, se define como una presión arterial elevada que no tiene una causa secundaria detectable.',
            ],
            ['name' => 'Cardiopatía hipertensiva',
             'description' => 'La hipertensión prolongada y mal atendida puede producir una serie de alteraciones de la estructura miocárdica, la vasculatura coronaria y el sistema de conducción eléctrica del corazón. Cardiopatía hipertensiva es como suelen llamarse en general todos los trastornos que afectan al corazón, tales como la hipertrofia ventricular izquierda, la cardiopatía coronaria, las arritmias cardíacas y la insuficiencia cardíaca congestiva, que son la consecuencia directa o indirecta de la hipertensión.',
            ],
            ['name' => 'Nefropatía hipertensiva',
             'description' => 'La nefropatía hipertensiva es una afección que consiste en daño renal por hipertensión arterial crónica.',
            ],
            ['name' => 'Crisis hipertensiva',
             'description' => '',
            ],
            ['name' => 'Hipertensión secundaria',
             'description' => 'Se define como una presión arterial sistólica mayor de 140 mmHg o una presión arterial diastólica mayor de 90 mmHg en tres mediciones consecutivas por el método del manguito, habiendo una causa detectable.',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Insuficiencia cardíaca',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Insuficiencia cardíaca congestiva',
             'description' => 'Síndrome clínico caracterizado por alteraciones de la función ventricular y de la regulación neurohormonal acompañadas de la intolerancia al esfuerzo y retención de líquidos.',
            ],
            ['name' => 'Insuficiencia ventricular izquierda',
             'description' => 'Síndrome clínico caracterizado por alteraciones de la función ventricular izquierda que ocasionan congestión pulmonar y retención de líquidos.',
            ],
            ['name' => 'Síndromes de alto gasto',
             'description' => 'Aumento del gasto cardíaco por encima de lo normal asociado a anemia, fístulas arteriovenosas, tirotoxicosis y otros síndromes. Puede ocasionar insuficiencia cardíaca.',
            ],
            ['name' => 'Insuficiencia ventricular derecha',
             'description' => 'Insuficiencia cardíaca por disfunción del ventrículo derecho, que cursa con distensión de las venas del cuello, hepatomegalia de estasis y edema en zonas declives.',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Arritmia cardíaca',
            'description' => 'Amplio y heterogéneo grupo de enfermedades caracterizadas por una alteración de la actividad eléctrica del corazón. El ritmo de los latidos cardíacos puede ser demasiado rápido o demasiado lento, y regular o irregular.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Despolarización auricular prematura',
             'description' => 'Despolarización eléctrica cardíaca que se origina en la aurícula y ocurre antes que el latido sinusal previsto.',
            ],
            ['name' => 'Despolarización prematura de la unión AV',
             'description' => 'Despolarización eléctrica cardíaca que surge del nódulo auriculoventricular compacto o del haz de His y ocurre antes que el ritmo sinusal previsto.',
            ],
            ['name' => 'Vía accesoria',
             'description' => 'Conexión eléctrica adicional que normalmente no pasa por el nódulo AV, suele insertarse directamente en el miocardio auricular y ventricular, pero también puede conectarse al sistema especializado de conducción (p. ej., haz de His, ramas derecha o izquierda, o uno de sus fascículos).',
            ],
            ['name' => 'Trastornos de la conducción',
             'description' => ' Cualquier alteración anormal de la conducción auriculoventricular.',
            ],
            ['name' => 'Síndrome de muerte súbita arrítmica',
             'description' => '',
            ],
            ['name' => 'Arritmia cardíaca asociada con un trastorno genético',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Coronariopatías',
            'description' => 'Trastornos que menoscaban el riesgo sanguíneo del músculo cardíaco (miocardio).',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Arterioesclerosis coronaria',
             'description' => ' La ateroesclerosis coronaria es la acumulación de colesterol, ácidos grasos, calcio, tejido conjuntivo fibroso y células (sobre todo macrófagos), que se suele conocer por «placa». La ateroesclerosis suele reducir el volumen de sangre que fluye por las arterias coronarias hasta el músculo cardíaco y, si es grave, provoca daño cardíaco, a menudo con dolor torácico y otros síntomas.',
            ],
            ['name' => 'Aneurisma de arteria coronaria',
             'description' => 'Dilatación coronaria que supera el diámetro de los segmentos adyacentes normales o el del vaso coronario más grande del paciente por un factor de 1,5.',
            ],
            ['name' => 'Disección de arteria coronaria',
             'description' => 'Disección de la arteria coronaria como resultado del desgarro de la capa interna de la arteria, o túnica íntima. El desgarro permite que la sangre penetre y que cause un hematoma intramural en la capa central, conocida por túnica media, y una reducción del lumen.',
            ],
            ['name' => 'Fístula adquirida de arteria coronaria',
             'description' => 'Cualquier comunicación entre una arteria coronaria y una de las cavidades cardíacas o uno de los grandes vasos adquirida como resultado de una intervención cardioquirúrgica, angioplastia coronaria, rotura de un aneurisma coronario o traumatismo cardíaco.',
            ],
            ['name' => 'Oclusión total crónica de arteria coronaria',
             'description' => 'La oclusión total crónica de arteria coronaria se define como la obstrucción completa de una o varias arterias, de un mínimo de 3 meses de duración, en la cual la puntuación de trombólisis en el infarto de miocardio [TEIM] es de cero o uno.',
            ],
            ['name' => 'Coronariopatía vasoespástica',
             'description' => 'Se refiere a la vasoconstricción repentina e intensa de una arteria coronaria epicárdica que causa la oclusión completa o parcial del vaso. A pesar de que puede formar parte de otros síndromes coronarios, representa la causa más común de la coronariopatía vasoespástica o angina variante.',
            ],
            ['name' => 'Coronariopatía microvascular',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Cardiopatías isquémicas aguda',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Infarto agudo de miocardio',
             'description' => 'El término infarto agudo del miocardio (IM) se debe utilizar cuando se demuestra la presencia de necrosis miocárdica en un contexto clínico compatible con una isquemia miocárdica aguda. En tales circunstancias cualquiera de los siguientes satisface los criterios diagnósticos del IM: La detección de un aumento o una disminución de los valores de los biomarcadores cardíacos y, como mínimo, un valor que se encuentre por encima del límite de referencia superior del percentil 99 y uno de los criterios enumerados a continuación: a) síntomas de isquemia; b) cambios nuevos o presuntamente nuevos e importantes del segmento ST y la onda T o bloqueo de la rama izquierda (BRI); c) aparición de ondas Q patológicas en el ECG; d) indicios en las pruebas diagnósticas por imágenes de pérdida nueva de miocardio viable o de un trastorno de la movilidad del movimiento de la pared regional; y e) la identificación de un trombo intracoronario mediante angiografía o autopsia. Infarto en cualquier punto del miocardio que se produce en las 4 semanas (28 días) posteriores a un infarto anterior (OMS).',
            ],
            ['name' => 'Infarto de miocardio subsecuente',
             'description' => 'Infarto localizado en cualquier parte del miocardio que se presenta durante las 4 semanas (28 días) posteriores a un infarto ocurrido con anterioridad.',
            ],
            ['name' => 'Trombosis coronaria que no conduce a infarto del miocardio',
             'description' => 'Trombo que se sobrepone a la rotura o erosión de una placa ateromatosa sin obstruir el riego sanguíneo coronario lo suficiente para producir un infarto.',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Cardiopatías isquémicas crónica',
            'description' => 'Enfermedad crónica del corazón debida a la ateroesclerosis de las arterias coronarias. Se caracteriza por angina de pecho y angina inestable.',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Infarto del miocardio antiguo',
             'description' => ' Infarto del miocardio antiguo, diagnosticado por ECG o por otra técnica diagnóstica especial, que no está dando síntomas.',
            ],
            ['name' => 'Miocardiopatía isquémica',
             'description' => 'Disfunción sistólica del ventrículo izquierdo en presencia de uno o varios de los siguientes factores: antecedentes de revascularización miocárdica o infarto de miocardio; estenosis de más del 75% del tronco principal izquierdo o de la arteria descendente anterior izquierda; o estenosis mayor del 75% de dos vasos o más. Abarca todo un espectro de estados fisiológicos anormales por discrepancia entre la perfusión y la contracción: infarto, aturdimiento, hibernación y cicatrización del miocardio.',
            ],
            ['name' => 'Cardiopatía isquémica crónica, sin especificación',
             'description' => '',
            ],
        ]);

        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'Coronariopatías',
            'description' => 'Trastornos que menoscaban el riesgo sanguíneo del músculo cardíaco (miocardio).',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'Arterioesclerosis coronaria',
             'description' => 'La ateroesclerosis coronaria es la acumulación de colesterol, ácidos grasos, calcio, tejido conjuntivo fibroso y células (sobre todo macrófagos), que se suele conocer por «placa». La ateroesclerosis suele reducir el volumen de sangre que fluye por las arterias coronarias hasta el músculo cardíaco y, si es grave, provoca daño cardíaco, a menudo con dolor torácico y otros síntomas.',
            ],
            ['name' => 'Aneurisma de arteria coronaria',
             'description' => 'Dilatación coronaria que supera el diámetro de los segmentos adyacentes normales o el del vaso coronario más grande del paciente por un factor de 1,5.',
            ],
            ['name' => 'Disección de arteria coronaria',
             'description' => 'Disección de la arteria coronaria como resultado del desgarro de la capa interna de la arteria, o túnica íntima. El desgarro permite que la sangre penetre y que cause un hematoma intramural en la capa central, conocida por túnica media, y una reducción del lumen.',
            ],
            ['name' => 'Fístula adquirida de arteria coronaria',
             'description' => ' Cualquier comunicación entre una arteria coronaria y una de las cavidades cardíacas o uno de los grandes vasos adquirida como resultado de una intervención cardioquirúrgica, angioplastia coronaria, rotura de un aneurisma coronario o traumatismo cardíaco.',
            ],
            ['name' => 'Oclusión total crónica de arteria coronaria',
             'description' => 'La oclusión total crónica de arteria coronaria se define como la obstrucción completa de una o varias arterias, de un mínimo de 3 meses de duración, en la cual la puntuación de trombólisis en el infarto de miocardio [TEIM] es de cero o uno.',
            ],
            ['name' => 'Coronariopatía vasoespástica',
             'description' => 'Se refiere a la vasoconstricción repentina e intensa de una arteria coronaria epicárdica que causa la oclusión completa o parcial del vaso. A pesar de que puede formar parte de otros síndromes coronarios, representa la causa más común de la coronariopatía vasoespástica o angina variante.',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES DEL SISTEMA CIRCULATORIO',
            'description' => 'ENFERMEDADES DEL SISTEMA QUE TRANSPORTA NUTRIENTES (COMO LOS AMINOACIDOS, LOS ELECTROLITOS O LA LINFA), LOS GASES, LAS HORMONAS, LAS CELULAS SANGUINEAS, ETC., HACIA Y DESDE LAS CELULAS DEL CUERPO PARA AYUDAR A COMBATIR ENFERMEDADES, ESTABILIZAR LA TEMPERATURA Y EL PH CORPORAL, Y MANTENER LA HOMEOSTASIS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'HIPERTENSION ARTERIAL',
             'description' => 'LA HIPERTENSION ESENCIAL (PRIMARIA), QUE REPRESENTA EL 95% DE TODOS LOS CASOS DE HIPERTENSION, SE DEFINE COMO UNA PRESION ARTERIAL ELEVADA QUE NO TIENE UNA CAUSA SECUNDARIA DETECTABLE',
            ],
            ['name' => 'CARDIOPATIA ISQUEMICA',
             'description' => 'ENFERMEDAD OCASIONADA POR LA ARTERIOSCLEROSIS DE LAS ARTERIAS CORONARIAS, ES DECIR, LAS ENCARGADAS DE PROPORCIONAR SANGRE AL MUSCULO CARDIACO (MIOCARDIO). LA ARTERIOSCLEROSIS CORONARIA ES UN PROCESO LENTO DE FORMACION DE COLAGENO Y ACUMULACION DE LIPIDOS (GRASAS) Y CELULAS INFLAMATORIAS (LINFOCITOS). ESTOS TRES PROCESOS PROVOCAN EL ESTRECHAMIENTO (ESTENOSIS) DE LAS ARTERIAS CORONARIAS',
            ],
        ]);


        $speciality = Speciality::where('name','GASTROENTEROLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES INTESTINALES BACTERIANAS',
            'description' => 'CUALQUIER TRASTORNO DE LOS INTESTINOS CAUSADO POR UNA INFECCION DE FUENTE BACTERIANA',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'COLERA',
             'description' => 'INFECCION INTESTINAL AGUDA CAUSADA POR LA INGESTION DE ALIMENTOS O AGUA CONTAMINADOS POR LA BACTERIA VIBRIO CHOLERAE',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'CAMBIO EN EL HABITO INTESTINAL',
            'description' => 'LOS HABITOS INTESTINALES SON LA HORA, EL TAMAÑO, LA CANTIDAD, LA CONSISTENCIA Y LA FRECUENCIA DE LAS DEPOSICIONES A LO LARGO DEL DIA. REPRESENTA UN CAMBIO EN LOS HABITOS INTESTINALES CUALQUIER ALTERACION DE LA REGULARIDAD DE ESTOS PARAMETROS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'DIARREAS',
             'description' => 'LA DIARREA ES UN TRASTORNO AGUDO O CRONICO QUE CONSISTE EN UN AUMENTO DE LA FRECUENCIA O UNA DISMINUCION DE LA CONSISTENCIA FIRME DE LAS DEPOSICIONES, POR LO GENERAL CON EVACUACIONES ACUOSAS EXCESIVAS Y FRECUENTES. EN ESTA ENTIDAD DIAGNOSTICA SE INCLUYE CUALQUIER DIARREA QUE NO ESTE DESCRITA EN OTRA PARTE, COMO LA QUE SE DEBE A TRASTORNOS DE LA MOTILIDAD INTESTINAL O A ENFERMEDADES FUNCIONALES DEL INTESTINO',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES INTESTINALES POR PROTOZOARIOS',
            'description' => 'CUALQUIER AFECCION DE LOS INTESTINOS CAUSADA POR LA INFECCION POR PARASITOS PROTOZOARIOS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'AMEBIASIS',
             'description' => 'AGUDA: ENFERMEDAD CAUSADA POR UNA INFECCION POR EL PARASITO PROTOZOARIO ENTAMOEBA HISTOLYTICA. CURSA CON FIEBRE, DOLOR ABDOMINAL, TENESMO O DIARREA SANGUINOLENTA. SE TRANSMITE POR VIA OROFECAL O POR LA INGESTION DE AGUA O ALIMENTOS CONTAMINADOS. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE ENTAMOEBA HISTOLYTICA EN UNA MUESTRA DE HECES O DE SANGRE',
            ],
        ]);


        $speciality = Speciality::where('name','HEPATOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'HEPATITIS VIRAL AGUDA',
            'description' => 'GRUPO DE ENFERMEDADES HEPATICAS CARACTERIZADAS POR INFLAMACION Y FIBROSIS DEL HIGADO Y CAUSADAS POR INFECCION DURANTE MENOS DE 6 MESES POR UNO O MAS VIRUS DE LA HEPATITIS (B, C Y D), CON O SIN INFECCION ASOCIADA POR EL VIH. SUELEN SER ASINTOMATICAS INCLUSO EN LA ETAPA DE CIRROSIS; EN OTROS CASOS, LAS MANIFESTACIONES CLINICAS SON CANSANCIO, INDURACION DEL REBORDE HEPATICO Y COMPLICACIONES DE LA CIRROSIS (PERDIDA DE MASA MUSCULAR, ASCITIS, ESPLENOMEGALIA O HIPERTENSION PORTAL). LOS VIRUS DE LA HEPATITIS B Y C SE TRANSMITEN POR LA SANGRE Y OTROS LIQUIDOS CORPORALES CONTAMINADOS, POR CONTACTO SEXUAL Y POR TRANSMISION MATERNOFILIAL DURANTE EL PARTO (TRANSMISION VERTICAL). ADEMAS DE LA DETECCION DE ANTIGENOS Y ANTICUERPOS ESPECIFICOS (P. EJ., ANTIGENO HBS Y ANTICUERPOS ANTI-VHC), LA EVALUACION DIAGNOSTICA SE EFECTUA MEDIANTE PRUEBAS PARA DETECTAR LOS ACIDOS NUCLEICOS VIRALES (ADN DEL VHB, ARN DEL VHC, ETC.)',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'HEPATITIS A AGUDA',
             'description' => 'INFLAMACION AGUDA CON LESION HEPATICA CAUSADA POR UNA INFECCION RECIENTE (< 6 MESES) POR EL VIRUS DE LA HEPATITIS A (VHA). SE TRANSMITE POR VIA OROFECAL. EL DIAGNOSTICO DE CONFIRMACION ES POR LA PRESENCIA DE ANTICUERPOS IGM ANTI-VHA EN EL SUERO. LAS MANIFESTACIONES CLINICAS, SI OCURREN, SE CARACTERIZAN POR ANOREXIA, NAUSEAS Y FIEBRE, CON ICTERICIA EN LOS CASOS GRAVES',
            ],
            ['name' => 'HEPATITIS B AGUDA',
             'description' => 'ES LA LESION HEPATICA AGUDA E INFLAMACION CAUSADA POR INFECCION RECIENTE Y DE CORTA DURACION (MENOS DE 6 MESES) CON EL VIRUS DE LA HEPATITIS B (VHB). LA TRANSMISION SE PRODUCE POR CONTAMINACION SEXUAL, DE SANGRE Y DE FLUIDOS CORPORALES (DISEMINACION PARENTERAL) Y DE MADRE A BEBE EN EL MOMENTO DEL NACIMIENTO (TRANSMISION VERTICAL). EL DIAGNOSTICO SE CONFIRMA POR LA PRESENCIA DE UNA ADQUISICION RECIENTE DE HBSAG, IDEALMENTE CON IGM-ANTI-HBC EN EL SUERO. LAS MANIFESTACIONES CLINICAS, SI OCURREN, SE CARACTERIZAN POR ANOREXIA, NAUSEAS Y FIEBRE, CON ICTERICIA EN CASOS GRAVES',
            ],
            ['name' => 'HEPATITIS C AGUDA',
             'description' => 'INFLAMACION AGUDA CON DAÑO HEPATICO POR INFECCION RECIENTE MAYOR A 6 MESES POR EL VIRUS DE LA HEPATITIS C (VHC). EN LA MAYORIA DE LOS CASOS SE TRANSMITE POR LA SANGRE Y OTROS LIQUIDOS CORPORALES CONTAMINADOS (DISEMINACION PARENTERAL) Y OCASIONALMENTE POR CONTACTO SEXUAL O POR TRANSMISION MATERNOFILIAL DURANTE EL PARTO (TRANSMISION VERTICAL). EL DIAGNOSTICO SE CONFIRMA POR LA ADQUISICION RECIENTE DE ANTICUERPOS ANTI-VHC Y LA PRESENCIA DE ARN DEL VHC EN EL SUERO. SON MINORIA LOS CASOS QUE PRESENTAN MANIFESTACIONES CLINICAS: ANOREXIA, NAUSEAS Y FIEBRE; EN RARAS OCASIONES, ICTERICIA. EN UNA GRAN PROPORCION DE LOS CASOS (>70%), LA INFECCION POR EL VHC SE CRONIFICA Y PRODUCE DAÑO HEPATICO DE DIVERSA GRAVEDAD',
            ],
            ['name' => 'HEPATITIS OTRA  VIRAL AGUDA',
             'description' => '',
            ],
            ['name' => 'HEPATITIS VIRAL AGUDA, SIN ESPECIFICACION',
             'description' => '',
            ],
        ]);


        $speciality = Speciality::where('name','NEUMOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'TUBERCULOSIS',
            'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION CON LA BACTERIA MYCOBACTERIUM TUBERCULOSIS. SE PRESENTA CON SINTOMAS QUE DEPENDEN DEL SITIO DE LA INFECCION. LA TRANSMISION ES COMUNMENTE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'TUBERCULOSIS',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION CON LA BACTERIA MYCOBACTERIUM TUBERCULOSIS. SE PRESENTA CON SINTOMAS QUE DEPENDEN DEL SITIO DE LA INFECCION. LA TRANSMISION ES COMUNMENTE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'GRIPE',
            'description' => 'CUALQUIER ENFERMEDAD RESPIRATORIA CAUSADA POR UNA INFECCION POR EL VIRUS DE LA GRIPE. SE CARACTERIZAN POR FIEBRE, TOS, CEFALEA, MIALGIAS, ARTRALGIAS, O MALESTAR GENERAL. SE TRANSMITEN POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL VIRUS CAUSAL EN UN FROTIS NASOFARINGEO, NASAL O FARINGEO',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'GRIPE',
             'description' => 'CUALQUIER ENFERMEDAD RESPIRATORIA CAUSADA POR UNA INFECCION POR EL VIRUS DE LA GRIPE. SE CARACTERIZAN POR FIEBRE, TOS, CEFALEA, MIALGIAS, ARTRALGIAS, O MALESTAR GENERAL. SE TRANSMITEN POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL VIRUS CAUSAL EN UN FROTIS NASOFARINGEO, NASAL O FARINGEO',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES DEL APARATO RESPIRATORIO',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'NEUMONIA',
             'description' => 'ENFERMEDAD DE LOS PULMONES, A MENUDO CAUSADA POR UNA INFECCION POR BACTERIAS, VIRUS, HONGOS O PARASITOS, AUNQUE NO SIEMPRE. SE CARACTERIZA POR FIEBRE, ESCALOFRIOS, TOS PRODUCTIVA, DOLOR TORACICO Y DISNEA. EL DIAGNOSTICO DE CONFIRMACION SE HACE MEDIANTE UNA RADIOGRAFIA DE TORAX',
            ],
            ['name' => 'NASOFARINGITIS AGUDA',
             'description' => 'ENFERMEDAD DE LAS VIAS RESPIRATORIAS ALTAS DEBIDA A UNA INFECCION POR RINOVIRUS. SE CARACTERIZA POR FARINGITIS, SECRECION NASAL, CONGESTION NASAL O TOS. SE TRANSMITE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS O POR CONTACTO DIRECTO',
            ],
            ['name' => 'SINUSITIS AGUDA',
             'description' => 'INFLAMACION DE INICIO RECIENTE O CORTA DURACION DE LA MUCOSA DE UNO O MAS DE SENOS PARANASALES (MAXILAR, ETMOIDAL, FRONTAL Y ESFENOIDAL), POR UNA INFECCION U OTRAS CAUSAS, COMO CARIES O LESIONES DENTALES. PUEDE HABER SUPURACION EN EL MEATO MEDIO Y POR DEBAJO DE LA LAMINA CRIBOSA; LOS PACIENTES PRESENTAN DISOSMIA, CONGESTION NASAL, FIEBRE Y DOLOR LOCALIZADO A LA PALPACION O ESPONTANEO. ENFERMEDADES SUBYACENTES QUE PUEDEN FAVORECER LA SINUSITIS AGUDA SON LA RINITIS ALERGICA, LAS DEFORMIDADES DEL TABIQUE NASAL Y LA RINITIS HIPERTROFICA',
            ],
            ['name' => 'FARINGITIS AGUDA',
             'description' => 'INFECCION O IRRITACION DE LA FARINGE O LAS AMIGDALAS. ES UNO DE LOS SINTOMAS DEL RESFRIADO COMUN. LA CAUSA SUELE SER INFECCIOSA; EN LA MAYOR PARTE DE LOS CASOS, DE ORIGEN VIRAL (AUNQUE PUEDE ESTAR CAUSADA TAMBIEN POR UNA INFECCION BACTERIANA). A MENUDO CURSA CON MOLESTIAS DE GARGANTA, DOLOR DE GARGANTA O DOLOR AL TRAGAR. OTROS SINTOMAS FRECUENTES SON CEFALEA, CANSANCIO GENERAL, DOLOR IRRADIADO AL OIDO Y LINFADENOPATIAS CERVICALES. EN LA EXPLORACION DE LA GARGANTA SE APRECIAN AMIGDALAS PALATINAS HIPEREMICAS E INFLAMACION DE LOS FOLICULOS LINFOIDES EN LA PARED POSTERIOR DE LA FARINGE. LOS PACIENTES CON FARINGITIS AGUDA SUELEN PRESENTAR DOLOR DE GARGANTA, PERO PUEDEN ASOCIARSE OTROS SINTOMAS EN FUNCION DEL MICROBIO PATOGENO CAUSANTE',
            ],
            ['name' => 'AMIGDALITIS AGUDA',
             'description' => '',
            ],
            ['name' => 'LARINGITIS Y TRAQUEITIS AGUDA',
             'description' => 'LA LARINGITIS AGUDA Y LA TRAQUEITIS SE DEFINEN RESPECTIVAMENTE COMO LA INFLAMACION AGUDA DE LA LARINGE Y LA TRAQUEA, CON HALLAZGOS LOCALES DE ERITEMA Y EDEMA DE LA MUCOSA LARINGEA Y TRAQUEAL. LA LARINGITIS AGUDA Y LA TRAQUEITIS SON INDUCIDAS POR INFECCIONES VIRALES DEL TRACTO RESPIRATORIO SUPERIOR O ABUSO DE LA VOZ',
            ],
            ['name' => 'LARINGITIS OBSTRUCTIVA Y EPIGLOTITIS',
             'description' => '',
            ],
            ['name' => 'INFECCIONES RESPIRATORIAS AGUDAS DE VIAS ALTAS, EN LOCALIZACIONES MULTIPLES Y NO ESPECIFICADAS',
             'description' => '',
            ],
            ['name' => 'BRONQUITIS AGUDA',
             'description' => 'ENFERMEDAD AGUDA DE LOS BRONQUIOS, HABITUALMENTE CAUSADA POR UNA INFECCION BACTERIANA O VIRAL Y CARACTERIZADA POR INFLAMACION DE LOS BRONQUIOS. CURSA CON TOS, SIBILANCIAS, DOLOR O MALESTAR TORACICO, FIEBRE O DISNEA. SE TRANSMITE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL MICROBIO PATOGENO CAUSANTE EN UNA MUESTRA DE ESPUTO',
            ],
            ['name' => 'BRONQUIOLITIS AGUDA < 2 AÑOS ',
             'description' => 'ENFERMEDAD AGUDA DE LOS BRONQUIOLOS, HABITUALMENTE CAUSADA POR UNA INFECCION BACTERIANA O VIRAL Y CARACTERIZADA POR INFLAMACION DE LOS BRONQUIOLOS Y CORIZA. CURSA CON TOS, SIBILANCIAS, TAQUIPNEA, FIEBRE O TIRAJE. SE TRANSMITE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL MICROBIO CAUSANTE EN UNA MUESTRA DE ESPUTO O DE SANGRE',
            ],
            ['name' => 'INFECCION AGUDA NO ESPECIFICADA DE LAS VIAS RESPIRATORIAS INFERIORES',
             'description' => '',
            ],
            ['name' => 'INFECCION RESPIRATORIA AGUDA GRAVE',
             'description' => 'ENFERMEDAD PULMONAR OBSTRUCTIVA CRONICA',
            ],
            ['name' => 'ENFERMEDAD PULMUNAR OBSTRUCTIVA CRONICA',
             'description' => 'ENFERMEDAD FRECUENTE, PREVENIBLE Y TRATABLE CARACTERIZADA POR LIMITACION PERSISTENTE DEL FLUJO AEREO QUE SUELE SER PROGRESIVA Y ESTAR ASOCIADA A UNA RESPUESTA INFLAMATORIA CRONICA AUMENTADA EN LAS VIAS RESPIRATORIAS Y LOS PULMONES FRENTE A PARTICULAS O GASES NOCIVOS. LAS EXACERBACIONES Y ENFERMEDADES CONCOMITANTES CONTRIBUYEN A LA GRAVEDAD GLOBAL EN UN PACIENTE CONCRETO',
            ],
            ['name' => 'ASMA BRONQUIAL',
             'description' => 'TRASTORNO INFLAMATORIO CRONICO DE LAS VIAS RESPIRATORIAS EN EL QUE INTERVIENEN MUCHAS CELULAS Y ELEMENTOS CELULARES. SE CARACTERIZA POR UN AUMENTO DE LA CAPACIDAD DE LA REACTIVIDAD TRAQUEAL Y BRONQUIAL A DIVERSOS ESTIMULOS, Y SE MANIFIESTA POR UNA CONSTRICCION GENERALIZADA DE LAS VIAS RESPIRATORIAS QUE PUEDE VARIAR DE INTENSIDAD YA SEA ESPONTANEAMENTE O COMO RESULTADO DEL TRATAMIENTO. CONDUCE A EPISODIOS RECURRENTES DE SIBILANCIAS, DISNEA, OPRESION TORACICA Y TOS, SOBRE TODO POR LA NOCHE O DE MADRUGADA',
            ],
        ]);


        $speciality = Speciality::where('name','INFECTOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCION POR EL VIRUS DE LA INMUNODEFICIENCIA HUMANA',
            'description' => 'UN CASO DE INFECCION POR EL VIH SE DEFINE COMO UNA PERSONA EN QUIEN SE HA CONFIRMADO LA INFECCION POR DICHO VIRUS, INDEPENDIENTEMENTE DEL ESTADIO CLINICO (PUEDE SER INCLUSO EL ESTADIO 4 O ENFERMEDAD SINTOMATICA GRAVE CONOCIDA POR SIDA), SEGUN CRITERIOS DE LABORATORIO Y DE CONFORMIDAD CON LAS DEFINICIONES Y LOS REQUISITOS DEL PAIS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'INFECCION ASINTOMATICA VIH',
             'description' => 'INFECCION POR EL VIRUS DE LA INMUNODEFICIENCIA HUMANA QUE COMPLICA EL EMBARAZO, EL PARTO O EL PUERPERIO',
            ],
            ['name' => 'INFECCION POR EL VIRUS DE LA INMUNODEFICIENCIA HUMANA',
             'description' => 'UN CASO DE INFECCION POR EL VIH SE DEFINE COMO UNA PERSONA EN QUIEN SE HA CONFIRMADO LA INFECCION POR DICHO VIRUS, INDEPENDIENTEMENTE DEL ESTADIO CLINICO (PUEDE SER INCLUSO EL ESTADIO 4 O ENFERMEDAD SINTOMATICA GRAVE CONOCIDA POR SIDA), SEGUN CRITERIOS DE LABORATORIO Y DE CONFORMIDAD CON LAS DEFINICIONES Y LOS REQUISITOS DEL PAIS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'OTRAS ENFERMEDADES BACTERIANAS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
             ['name' => 'TOS FERINA',
              'description' => 'ENFERMEDAD DEL ARBOL RESPIRATORIO SUPERIOR CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMNEGATIVA BORDETELLA. SUELE CURSAR CON TOS PAROXISTICA, ESTRIDOR INSPIRATORIO Y DESMAYOS O VOMITOS DESPUES DE LOS ACCESOS DE TOS. LA TRANSMISION SE PRODUCE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS. EL DIAGNOSTICO DE CONFIRMACION ES MEDIANTE LA DETECCION DE BORDETELLA EN MUESTRAS NASOFARINGEAS O DE ESPUTO, O DE ANTICUERPOS CONTRA BORDETELLA',
             ],
             ['name' => 'TETANOS',
              'description' => 'ENFERMEDAD DE LAS FIBRAS DEL MUSCULO ESQUELETICO CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMPOSITIVA CLOSTRIDIUM TETANI. SE CARACTERIZA POR ESPASMOS MUSCULARES. LA TRANSMISION ES POR CONTACTO DIRECTO EN UNA HERIDA ABIERTA',
             ],
             ['name' => 'TETANOS OBSTETRICO',
              'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMPOSITIVA CLOSTRIDIUM TETANI, LA CUAL SE CARACTERIZA POR CAUSAR UNA CONTRACCION PROLONGADA DE LAS FIBRAS MUSCULARES ESQUELETICAS. ESTA ENTIDAD DIAGNOSTICA SE REFIERE EN PARTICULAR A SU PRESENCIA DURANTE EL EMBARAZO O LAS SEIS SEMANAS POSTERIORES AL PARTO. LA TRANSMISION ES POR CONTACTO DIRECTO',
             ],
             ['name' => 'TETANOS NEONATAL',
              'description' => 'ENFERMEDAD DE LOS RECIEN NACIDOS CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMPOSITIVA CLOSTRIDIUM TETANI. SE CARACTERIZA POR ESPASMOS MUSCULARES GENERALIZADOS EN LOS PRIMEROS DIAS DESPUES DEL PARTO. SUELE TRANSMITIRSE POR CONTACTO DIRECTO O COMO CONSECUENCIA DE UNA AUSENCIA DE INMUNIDAD MATERNA',
             ],
             ['name' => 'DIFTERIA',
              'description' => 'ENFERMEDAD RESPIRATORIA POR LO GENERAL CAUSADA POR LA BACTERIA GRAMPOSITIVA CORYNEBACTERIUM DIPHTHERIAE. SE CARACTERIZA POR DOLOR DE GARGANTA, FIEBRE, Y UNA SEUDOMEMBRANA QUE RECUBRE LAS AMIGDALAS, LA FARINGE O LA CAVIDAD NASAL. LA TRANSMISION SE PRODUCE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS O POR CONTACTO CUTANEO DIRECTO. EL DIAGNOSTICO DE CONFIRMACION ES POR LA DETECCION DE CORYNEBACTERIUM DIPHTHERIAE A PARTIR DE UN FROTIS DE FARINGE O UN TEJIDO INFECTADO Y SOBRE LA BASE DE LOS SIGNOS CLINICOS',
             ],
             ['name' => 'MENINGITIS MENINGOCOCICA',
              'description' => 'INFLAMACION MENINGEA CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMNEGATIVA NEISSERIA MENINGITIDIS. SE CARACTERIZA POR FIEBRE ALTA, RIGIDEZ DE LA NUCA, CEFALEA INTENSA, VOMITOS, PURPURA, FOTOFOBIA Y, EN OCASIONES, ESCALOFRIOS, ALTERACION DEL ESTADO MENTAL Y CONVULSIONES. SE TRANSMITE A LAS MENINGES POR LA VIA HEMATOGENA DESPUES DEL CONTAGIO POR GOTICULAS AEREAS O POR CONTACTO DIRECTO. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DE NEISSERIA MENINGITIDIS MEDIANTE PUNCION LUMBAR, PRUEBAS DE AGLUTINACION, O LA REACCION EN CADENA DE LA POLIMERASA'
             ],
             ['name' => 'ENFERMEDAD MENINGOCOCICA',
              'description' => 'ENFERMEDAD GRAVE POR INFECCION DE LAS MEMBRANAS QUE RECUBREN EL CEREBRO Y LA MEDULA ESPINAL (MENINGITIS), O POR DISEMINACION HEMATOGENA (BACTERIEMIA O SEPTICEMIA). LOS MENINGOCOCOS SE TRANSMITEN MEDIANTE EL INTERCAMBIO DE LAS SECRECIONES RESPIRATORIAS Y FARINGEAS, COMO LA SALIVA (POR EJEMPLO, POR CONVIVENCIA EN CONDICIONES DE HACINAMIENTO O POR EL BESO). LAS ENFERMEDADES MENINGOCOCICAS (MENINGOCOCOSIS) PUEDEN SER TRATADAS CON ANTIBIOTICOS PERO ES SUMAMENTE IMPORTANTE DAR ATENCION MEDICA INMEDIATA. LA MEJOR DEFENSA CONTRA LAS ENFERMEDADES MENINGOCOCICAS CONSISTE EN PONERSE LAS VACUNAS RECOMENDADAS A SU DEBIDO TIEMPO'
             ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'PAROTIDITIS',
            'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA PAROTIDITIS. SUELE CURSAR CON FIEBRE, CEFALEA, CANSANCIO Y FINALMENTE PAROTIDITIS. SE TRANSMITE POR CONTACTO DIRECTO O INDIRECTO CON LAS SECRECIONES RESPIRATORIAS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'PAROTIDITIS',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA PAROTIDITIS. SUELE CURSAR CON FIEBRE, CEFALEA, CANSANCIO Y FINALMENTE PAROTIDITIS. SE TRANSMITE POR CONTACTO DIRECTO O INDIRECTO CON LAS SECRECIONES RESPIRATORIAS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES VIRALES CARACTERIZADAS POR LESIONES CUTANEAS O MUCOSAS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'SARAMPION',
             'description' => 'ENFERMEDAD RESPIRATORIA CAUSADA POR UNA INFECCION POR EL VIRUS DEL SARAMPION (GENERO MORBILLIVIRUS). SE CARACTERIZA POR UNA ERUPCION MACULOSA, FIEBRE, TOS, CONJUNTIVITIS O MALESTAR GENERAL. TAMBIEN PUEDEN VERSE EN LA BOCA DIMINUTAS MANCHAS PUNTIFORMES DE COLOR BLANCO AZULADO (MANCHAS DE KOPLIK). SE TRANSMITE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS, POR EL AIRE O POR CONTACTO DIRECTO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE ARN DEL VIRUS CAUSAL O DE ANTICUERPOS IGM ESPECIFICOS CONTRA EL VIRUS DEL SARAMPION',
            ],
            ['name' => 'RUBEOLA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA RUBEOLA. SUELE CURSAR CON LINFADENOPATIA O UNA ERUPCION CUTANEA QUE COMIENZA EN LA CARA Y SE EXTIENDE A LAS EXTREMIDADES Y EL TRONCO. SE TRANSMITE HABITUALMENTE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS O POR CONTACTO DIRECTO',
            ],
            ['name' => 'VARICELA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA VARICELA-ZOSTER. SE CARACTERIZA POR UNA ERUPCION VESICULOSA Y FIEBRE. SE TRANSMITE POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS O POR CONTACTO DIRECTO CON EL CONTENIDO LIQUIDO DE LAS VESICULAS',
            ],
            ['name' => 'VIRUELA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA VIRUELA. SE CARACTERIZA POR FIEBRE Y UNA ERUPCION MACULOPAPULOSA QUE EVOLUCIONA CON FORMACION DE VESICULAS (POR LO GENERAL EN LA CARA Y LAS EXTREMIDADES SUPERIORES E INFERIORES) Y FIEBRE. SE TRANSMITE POR CONTACTO DIRECTO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DEL VIRUS CAUSAL EN UNA MUESTRA DE LA PIEL AFECTADA POR LA ERUPCION. EN 1980, LA 33.ª ASAMBLEA MUNDIAL DE LA SALUD DECLARO ERRADICADA LA VIRUELA. LA CLASIFICACION SE MANTIENE PARA FINES DE LA VIGILANCIA EPIDEMIOLOGICA',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'DENGUE',
            'description' => 'EL DENGUE ES UNA ENFERMEDAD VIRAL TRANSMITIDA POR LA PICADURA DE UN MOSQUITO INFECTADO POR LOS VIRUS DEL DENGUE. ES UNA ENTIDAD NOSOLOGICA CON DIFERENTES PRESENTACIONES CLINICAS Y A MENUDO EVOLUCION Y DESENLACE CLINICOS IMPREVISIBLES. LA MAYORIA DE LOS PACIENTES SE RECUPERAN TRAS UN CUADRO CLINICO AUTOLIMITADO QUE NO REVISTE GRAVEDAD (NAUSEAS, VOMITOS, ERUPCION CUTANEA, DOLORES), PERO UNA PEQUEÑA PROPORCION DE PACIENTES PROGRESAN A LA ENFERMEDAD GRAVE, QUE SUELE CARACTERIZARSE POR EXTRAVASACION PLASMATICA CON O SIN HEMORRAGIA, SI BIEN PUEDEN PRESENTARSE TAMBIEN HEMORRAGIAS IMPORTANTES O AFECTACION ORGANICA GRAVE, CON O SIN SHOCK',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'DENGUE SIN SIGNOS DE ALARMA',
             'description' => 'EL DENGUE ES UNA ENFERMEDAD VIRAL TRANSMITIDA POR LA PICADURA DE UN MOSQUITO INFECTADO POR LOS VIRUS DEL DENGUE. DENGUE DE GRADO 1. FIEBRE DEL DENGUE SIN SIGNOS DE ALARMA. FIEBRE HEMORRAGICA DEL DENGUE SIN SIGNOS DE ALARMA',
            ],
            ['name' => 'DENGUE CON SIGNOS DE ALARMA',
             'description' => 'LOS SIGNOS CLINICOS DE ALARMA SON: DOLOR ABDOMINAL, HEMORRAGIA DE MUCOSAS, LETARGO O INQUIETUD, DISMINUCION RAPIDA DEL NUMERO DE PLAQUETAS, AUMENTO DEL HEMATOCRITO. OTROS SIGNOS POSIBLES: VOMITOS PERSISTENTES, ACUMULACION VISIBLE DE LIQUIDOS, HEPATOMEGALIA DE MAS DE 2 CM',
            ],
            ['name' => 'DENGUE GRAVE',
             'description' => 'LOS SIGNOS CLINICOS SON: 1) EXTRAVASACION IMPORTANTE DE PLASMA QUE LLEVA AL SHOCK (SHOCK DEL DENGUE) O ACUMULACION DE LIQUIDO CON DIFICULTAD RESPIRATORIA; 2) HEMORRAGIA GRAVE, EVALUADA POR EL PERSONAL CLINICO; 3) AFECTACION ORGANICA GRAVE: HIGADO (AST O ALT ≥ 1000); SNC (ALTERACION DE LA CONCIENCIA); OTROS ORGANOS, COMO EL CORAZON (MIOCARDITIS) O LOS RIÑONES (NEFRITIS)',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ALGUNAS FIEBRES VIRALES TRANSMITIDAS POR ARTROPODOS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'CHIKUNGUNYA',
             'description' => 'LA FIEBRE CHIKUNGUNYA ES UNA ENFERMEDAD VIRICA TRANSMITIDA AL SER HUMANO POR MOSQUITOS INFECTADOS. ADEMAS DE FIEBRE Y FUERTES DOLORES ARTICULARES, PRODUCE OTROS SINTOMAS, TALES COMO DOLORES MUSCULARES, DOLORES DE CABEZA, NAUSEAS, CANSANCIO Y ERUPCIONES CUTANEAS',
            ],
            ['name' => 'ZIKA',
             'description' => 'INFECCION POR EL VIRUS DE ZIKA ES CAUSADA POR LA PICADURA DE UN MOSQUITO AEDES INFECTADO. LOS SINTOMAS MAS COMUNES DE LA INFECCION POR EL VIRUS DE ZIKA SON FIEBRE LEVE Y EXANTEMA (ERUPCION CUTANEA), Y SUELEN IR ACOMPAÑADOS DE CONJUNTIVITIS, DOLOR MUSCULAR O DE LAS ARTICULACIONES Y MALESTAR GENERAL QUE COMIENZA 2-7 DIAS DESPUES DE LA PICADURA DEL MOSQUITO INFECTADO',
            ],
            ['name' => ' FIEBRE AMARILLA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL VIRUS DE LA FIEBRE AMARILLA. SE CARACTERIZA POR FIEBRE, ESCALOFRIOS, CEFALEA, MIALGIAS, CONGESTION CONJUNTIVAL O BRADICARDIA RELATIVA. EN LOS CASOS GRAVES PUEDE CURSAR TAMBIEN CON AUMENTO DE LA FIEBRE, ICTERICIA, INSUFICIENCIA RENAL O HEMORRAGIA. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO INFECTADO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE ANTICUERPOS IGM CONTRA EL VIRUS DE LA FIEBRE AMARILLA EN UNA MUESTRA DE SUERO',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES VIRALES DEL SISTEMA NERVIOSO CENTRAL',
            'description' => 'CUALQUIER AFECCION DEL SISTEMA NERVIOSO CENTRAL CAUSADA POR UNA INFECCION VIRAL',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'ENCEFALITIS EQUINA VENEZOLANA',
             'description' => 'ENTIDADES ZOONOTICAS DE ORIGEN VIRAL, TRANSMITIDAS POR MOSQUITOS VECTORES, DE AMPLIA DISTRIBUCION GEOGRAFICA, CAPACES DE PRODUCIR EPIDEMIAS CARACTERIZADAS POR EL DESARROLLO DE SINDROMES NEUROLOGICOS AL CAUSAR MENINGO - ENCEFALOMIELITIS EN LOS EQUIDOS (EQUINOS, ASNALES Y MULARES) Y HUMANOS AFECTADOS, CON GRADOS VARIABLES DE MORBILIDAD Y LETALIDAD',
            ],
            ['name' => 'RABIA',
             'description' => 'ENFERMEDAD CAUSADA POR LA INFECCION POR EL VIRUS DE LA RABIA. SE CARACTERIZA POR FIEBRE Y CEFALEA, SEGUIDAS DE SINTOMAS NEUROLOGICOS ENTRE LOS CUALES PREDOMINAN LOS DE LA RABIA FURIOSA O PARALITICA',
            ],
            ['name' => 'MENINGITIS VIRAL',
             'description' => 'INFLAMACION DE LAS MENINGES CAUSADA POR UNA INFECCION VIRAL. SE CARACTERIZA POR FIEBRE ALTA, CEFALEA, VOMITOS, NAUSEAS, RIGIDEZ DE NUCA, FOTOFOBIA, SOMNOLENCIA, EXANTEMA CUTANEO, DESORIENTACION, CONVULSIONES O SINCOPE',
            ],
            ['name' => 'FIEBRE DEL OESTE DEL NILO',
             'description' => 'EL VIRUS DEL NILO PUEDE CAUSAR UNA ENFERMEDAD MORTAL DEL SISTEMA NERVIOSO. SE ENCUENTRA POR LO COMUN EN AFRICA, EUROPA, EL ORIENTE MEDIO, AMERICA DEL NORTE Y ASIA OCCIDENTAL. SE MANTIENE EN LA NATURALEZA MEDIANTE UN CICLO QUE INCLUYE LA TRANSMISION ENTRE AVES Y MOSQUITOS. PUEDE INFECTAR A LOS SERES HUMANOS, LOS CABALLOS Y OTROS MAMIFEROS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES PROTOZOARIAS EXTRAINTESTINALES',
            'description' => 'INFECCIONES POR MICROORGANISMOS UNICELULARES DEL SUBREINO PROTOZOA',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'LEISHMANIASIS VISCERAL',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR PARASITOS PROTOZOARIOS DEL GENERO LEISHMANIA. SE CARACTERIZA POR FIEBRE BIFASICA, HEPATOESPLENOMEGALIA, PANCITOPENIA, EMACIACION Y OSCURECIMIENTO DE LA PIEL, SI BIEN EN OCASIONES ES ASINTOMATICA. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO HEMBRA INFECTADO DEL GENERO PHLEBOTOMUS. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DE LAS LEISHMANIAS EN UNA MUESTRA DE TEJIDO O DE SANGRE, O POR DETECCION DE ANTICUERPOS CONTRA LAS LEISHMANIAS',
            ],
            ['name' => 'LEISHMANIASIS CUTANEA',
             'description' => 'LA LEISHMANIOSIS CUTANEA SE PRODUCE POR LAS PICADURAS DE FLEBOTOMOS INFECTADOS POR PARASITOS PROTOZOARIOS DEL GENERO LEISHMANIA. LOS FLEBOTOMOS (MOSQUITOS DEL GENERO PHLEBOTOMUS) CONSTITUYEN EL PRINCIPAL VECTOR EN EL VIEJO MUNDO (MEDITERRANEO, AFRICA DEL NORTE, ETIOPIA Y ASIA), DONDE PREDOMINAN L. MAJOR, L. TROPICA, L. AETHIOPICA Y L. DONOVANI INFANTUM. OTROS FLEBOTOMOS TRANSMITEN LA ENFERMEDAD EN EL NUEVO MUNDO: L. MEXICANA Y L. BRASILIENSIS. LA PRESENTACION MAS FRECUENTE ES CON ULCERAS O NODULOS COSTROSOS EN PUNTOS DEL CUERPO DESCUBIERTOS, QUE SANAN GRADUALMENTE Y DEJAN CICATRICES. LAS FORMAS MEXICANA Y ETIOPE TIENDEN A CAUSAR UNA INFILTRACION DIFUSA DE LA PIEL; LAS FORMAS SUDAMERICANAS EVOLUCIONAN CON FRECUENCIA A UNA LEISHMANIASIS MUCOCUTANEA',
            ],
            ['name' => 'LEISHMANIASIS MUCOCUTANEA',
             'description' => 'INFECCION SECUNDARIA DE LAS MUCOSAS NASAL Y BUCAL, SOBRE TODO POR LEISHMANIA BRAZILIENSIS. POR LO GENERAL SE MANIFIESTA EN UN PLAZO DE DOS AÑOS A PARTIR DE LA INFECCION CUTANEA INICIAL, PERO A MENUDO DESPUES DE QUE ESTA HA CICATRIZADO. ES EL RESULTADO DE UNA DISEMINACION HEMATOGENA O LINFATICA DE LA INFECCION Y PUEDE CAUSAR DESTRUCCION TISULAR GRAVE A NIVEL LOCAL',
            ],
            ['name' => ' LEISHMANIASIS SIN ESPECIFICACION',
             'description' => '',
            ],
            ['name' => 'ENFERMEDAD DE CHAGAS AGUDA',
             'description' => 'ENFERMEDAD CAUSADA POR LA INFECCION AGUDA POR EL PARASITO PROTOZOARIO TRYPANOSOMA CRUZI. SE CARACTERIZA POR FIEBRE, CEFALEA, LINFADENOPATIA, PALIDEZ, DOLOR MUSCULAR, DISNEA, EDEMA, O DOLOR TORACICO O ABDOMINAL, PERO PUEDE CURSAR TAMBIEN CON AFECTACION CARDIACA (MIOCARDIOPATIA, CARDIOPATIA CORONARIA O MIOCARDITIS). SE TRANSMITE POR VIA YATROGENA, POR VIA MATERNOFILIAL, POR CONTACTO DIRECTO CON LAS HECES DE UN TRIATOMINO INFECTADO, O POR INGESTION DE ALIMENTOS O AGUA CONTAMINADOS. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DEL TRIPANOSOMA CAUSAL EN UNA MUESTRA DE SANGRE',
            ],
            ['name' => 'ENFERMEDAD DE CHAGAS CRONICA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION CRONICA POR EL PARASITO PROTOZOARIO TRYPANOSOMA CRUZI. SUELE CURSAR CON MALESTAR GENERAL IMPORTANTE Y AFECTACION CARDIACA (MIOCARDIOPATIA, INSUFICIENCIA CARDIACA, TROMBOEMBOLIA, BRADIARRITMIAS, TAQUIARRITMIAS, ANEURISMAS APICALES O PARO CARDIACO). LA TRANSMISION PUEDE SER POR VIA YATROGENA, POR VIA MATERNOFILIAL, POR CONTACTO DIRECTO CON LAS HECES DE UN TRIATOMA INFECTADO, O POR INGESTION DE ALIMENTOS O AGUA CONTAMINADOS. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DEL TRIPANOSOMA CAUSAL EN UNA MUESTRA DE SANGRE',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ALGUNAS ENFERMEDADES VIRALES ZOONOTICAS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'FIEBRE HEMORRAGICA VENEZOLANA',
             'description' => 'ENFERMEDAD PRINCIPALMENTE DE LAS ZONAS RURALES DEL CENTRO DE VENEZUELA CAUSADA POR UNA INFECCION POR EL VIRUS DE GUANARITO. SUS PRINCIPALES SIGNOS Y SINTOMAS SON FIEBRE, MALESTAR GENERAL, CEFALEA, ARTRALGIAS, DOLOR DE GARGANTA, VOMITOS, DOLOR ABDOMINAL, DIARREA, CONVULSIONES Y DIVERSAS MANIFESTACIONES HEMORRAGICAS. LA MAYORIA DE LOS PACIENTES PRESENTAN ASIMISMO LEUCOPENIA Y TROMBOCITOPENIA. LA LETALIDAD GLOBAL PUEDE ALCANZAR EL 30% INCLUSO EN PACIENTES HOSPITALIZADOS QUE RECIBEN TRATAMIENTO SINTOMATICO. LA ENFERMEDAD SE TRANSMITE POR INHALACION, INGESTION O CONTACTO DIRECTO CON EXCRECIONES Y LIQUIDOS CORPORALES DE ROEDORES INFECTADOS. EL DIAGNOSTICO ES POR IDENTIFICACION DEL VIRUS CAUSAL EN MUESTRAS DE SANGRE O SECRECIONES MUCOSAS',
            ],
            ['name' => 'SINDROME RESPIRATORIO AGUDO SEVERO  SARS',
             'description' => 'ENFERMEDAD RESPIRATORIA CAUSADA POR UNA INFECCION POR CORONAVIRUS. SE CARACTERIZA POR FIEBRE, CEFALEA, TOS, MIALGIAS, TAQUICARDIA O DIARREA, Y PUEDE PROGRESAR A NEUMONIA. LA ENFERMEDAD SE TRANSMITE POR CONTACTO DIRECTO, POR INHALACION DE SECRECIONES RESPIRATORIAS INFECTADAS O POR TRANSMISION AEREA. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL CORONAVIRUS CAUSAL EN UNA MUESTRA DE SANGRE, HECES, SECRECIONES RESPIRATORIAS O TEJIDOS CORPORALES',
            ],
            ['name' => 'ENFERMEDAD HANTAVIRUS',
             'description' => 'ZOONOSIS VIRAL AGUDA CARACTERIZADA POR FIEBRE DE INICIO SUBITO, SIGNOS SEUDOGRIPALES (P. EJ., ESCALOFRIOS, CEFALEA, MIALGIAS, TOS SECA), SIGNOS GASTROINTESTINALES (P. EJ., DOLOR ABDOMINAL DIFUSO, VOMITOS, DIARREA), PROBLEMAS TRANSITORIOS DE LA VISION (MIOPIA AGUDA), LUMBALGIA POR TUMEFACCION RENAL, MANIFESTACIONES HEMORRAGICAS DE DIVERSA CONSIDERACION A VECES SEGUIDAS DE DISNEA DE RAPIDA PROGRESION POR EDEMA AGUDO DE PULMON NO CARDIOGENO, O AFECTACION RENAL. ESTA ULTIMO SE CARACTERIZA POR MICROHEMATURIA Y PROTEINURIA INICIALES, A MENUDO MASIVAS Y A VECES ACOMPAÑADAS DE UN DISFUNCION RENAL TRANSITORIA. TODAS LAS INFECCIONES POR HANTAVIRUS SE ACOMPAÑAN DE TROMBOCITOPENIA TRANSITORIA EN DIVERSO GRADO, QUE PUEDE SERVIR COMO UN INDICADOR DE LA GRAVEDAD CLINICA',
            ],
            ['name' => 'EBOLA',
             'description' => 'ENFERMEDAD GRAVE, CON ALTA LETALIDAD, CAUSADA POR UNA INFECCION POR EL VIRUS DEL EBOLA U OTRO VIRUS ESTRECHAMENTE EMPARENTADO',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ALGUNAS ENFERMEDADES BACTERIANAS ZOONOTICAS',
            'description' => 'ENFERMEDADES BACTERIANAS QUE SE TRANSMITEN A LOS SERES HUMANOS POR CONTACTO CON ANIMALES VERTEBRADOS INFECTADOS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'LEPTOSPIROSIS',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR BACTERIAS GRAMNEGATIVAS DEL GENERO LEPTOSPIRA. EN SU PRIMERA FASE (LEPTOSPIROSICA) SE CARACTERIZA POR UN CUADRO CLINICO GENERALIZADO (FIEBRE, ESCALOFRIOS O MIALGIAS) O PUEDE SER ASINTOMATICA. EN SU SEGUNDA FASE (INMUNITARIA) PUEDE HABER AFECTACION CARDIACA, HEPATICA O ENCEFALICA; LOS SINTOMAS DEPENDEN DE LA LOCALIZACION. SE TRANSMITE POR LA INGESTION DE AGUA O ALIMENTOS CONTAMINADOS, POR CONTACTO CUTANEO DIRECTO O POR GOTICULAS RESPIRATORIAS. EL DIAGNOSTICO DE CONFIRMACION ES POR LA IDENTIFICACION DE LEPTOSPIRA EN MUESTRAS OBTENIDAS DE LA PERSONA AFECTADA',
            ],
            ['name' => 'PESTE',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR LA BACTERIA GRAMNEGATIVA YERSINIA PESTIS. LOS SINTOMAS DEPENDEN DE LA LOCALIZACION DE LA INFECCION. PUEDE SER MORTAL. SE TRANSMITE POR LA PICADURA DE UNA PULGA INFECTADA, POR CONTACTO DIRECTO, O POR GOTICULAS AEREAS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES NO VIRALES Y NO ESPECIFICADAS DEL SISTEMA NERVIOSO CENTRAL',
            'description' => 'CUALQUIER INFECCION DEL SISTEMA NERVIOSO CENTRAL CAUSADA POR BACTERIAS, VIRUS, HONGOS O PARASITOS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'MENINGITIS BACTERIANA',
             'description' => 'CUALQUIER ENFERMEDAD DE LAS MENINGES CAUSADA POR UNA BACTERIA',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'CAUSAS EXTERNAS DE MORBILIDAD O MORTALIDAD',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'INTOXICACION POR PLAGUICIDAS',
             'description' => 'EXPOSICION DE INTENCION NO DETERMINADA A PLAGUICIDAS O A SUS EFECTOS NOCIVOS',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'PALUDISMO',
            'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR PARASITOS PROTOZOARIOS DEL GENERO PLASMODIUM. SUELE PRODUCIR FIEBRE, ESCALOFRIOS, CEFALEA, NAUSEAS Y VOMITOS O MALESTAR GENERAL. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO INFECTADO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE LOS PLASMODIOS EN UNA MUESTRA DE SANGRE',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'PALUDISMO POR PLASMODIUM VIVAX',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL PARASITO PROTOZOARIO PLASMODIUM VIVAX. SE CARACTERIZA POR FIEBRE, ESCALOFRIOS, CEFALEA, NAUSEAS Y VOMITOS, DOLORES POR TODO EL CUERPO O MALESTAR GENERAL. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO INFECTADO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE PLASMODIUM VIVAX EN UNA MUESTRA DE SANGRE',
            ],
            ['name' => 'PALUDISMO POR PLASMODIUM FALCIPARUM',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL PARASITO PROTOZOARIO PLASMODIUM FALCIPARUM. SE CARACTERIZA POR FIEBRE, ESCALOFRIOS, CEFALEA, MIALGIAS, ARTRALGIAS, DEBILIDAD, VOMITOS O DIARREA. TAMBIEN PUEDE CURSAR CON ESPLENOMEGALIA, ANEMIA, TROMBOCITOPENIA, HIPOGLUCEMIA, DISFUNCION PULMONAR O RENAL Y ALTERACIONES NEUROLOGICAS. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO INFECTADO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE PLASMODIUM FALCIPARUM EN UNA MUESTRA DE SANGRE',
            ],
            ['name' => 'PALUDISMO POR PLASMODIUM MALARIAE',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION POR EL PARASITO PROTOZOARIO PLASMODIUM MALARIAE. SE CARACTERIZA POR FIEBRE, ESCALOFRIOS, CEFALEA, NAUSEAS Y VOMITOS, DOLORES POR TODO EL CUERPO O MALESTAR GENERAL. SE TRANSMITE POR LA PICADURA DE UN MOSQUITO INFECTADO. EL DIAGNOSTICO DE CONFIRMACION ES POR DETECCION DE PLASMODIUM MALARIAE EN UNA MUESTRA DE SANGRE',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'INFECCIONES DE TRANSMISION PREDOMINANTEMENTE SEXUAL',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'SIFILIS',
             'description' => 'LA SIFILIS ES UNA INFECCION CURABLE CAUSADA POR UNA BACTERIA LLAMADA TREPONEMA PALLIDUM. SE TRANSMITE POR VIA SEXUAL Y TAMBIEN, DURANTE EL EMBARAZO, DE LA MADRE AL FETO',
            ],
            ['name' => 'INFECCION GONOCOCICA',
             'description' => 'ENFERMEDAD CAUSADA POR INFECCION CON LA BACTERIA GRAMNEGATIVA NEISSERIA GONORRHOEAE. SE TRANSMITE POR CONTACTO SEXUAL Y EL DIAGNOSTICO SE CONFIRMA MEDIANTE LA DETECCION DE NEISSERIA GONORRHOEAE',
            ],
            ['name' => 'INFECCION POR VIRUS PAPILOMA HUMANO',
             'description' => '',
            ],
            ['name' => 'CONDILOMA ACUMINADO',
             'description' => 'VERRUGAS ANOGENITALES. AFECCION DE LA PIEL O LA MUCOSA DE LA ZONA ANOGENITAL CAUSADA POR LA INFECCION POR EL VIRUS DEL PAPILOMA HUMANO (VPH). POR LO GENERAL ES ASINTOMATICA, AUNQUE TAMBIEN PUEDE PRODUCIR LESIONES PLANAS, PAPULARES O PEDICULADAS, SEGUN LA LOCALIZACION DE LA INFECCION. SE TRANSMITE POR CONTACTO DIRECTO O SEXUAL',
            ],
            ['name' => 'TRICOMONIASIS',
             'description' => 'ENFERMEDAD CAUSADA POR INFECCION CON EL PARASITO PROTOZOARIO TRICHOMONAS. PRODUCE SINTOMAS QUE DEPENDEN DE LA LOCALIZACION DE LA INFECCION',
            ],
        ]);


        $speciality = Speciality::where('name','NEUROLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'SINTOMAS PARALITICOS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'PARAPLEJIA FLACIDA',
             'description' => '',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES DEL SISTEMA NERVIOSO',
            'description' => 'AFECCIONES QUE SON PROPIAS DEL SISTEMA NERVIOSO O QUE GUARDAN RELACION CON EL',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'SINDROME DE GUILLAIN BARRE',
             'description' => 'DEBILIDAD PROGRESIVA DE LAS EXTREMIDADES QUE TRANSCURRE A LO LARGO DE UNOS DIAS HASTA UN MAXIMO DE 28 Y QUE TIENE COMO CARACTERISTICAS PRINCIPALES UN DEFICIT SIMETRICO, ARREFLEXIA, HIPOESTESIA LEVE O AUSENTE, ELEVACION DE LAS PROTEINAS DEL LIQUIDO CEFALORRAQUIDEO Y DISMINUCION DE LAS VELOCIDADES DE LA CONDUCCION NERVIOSA. EL TRASTORNO PUEDE PRESENTARSE TRAS UNA INFECCION RESPIRATORIA SUPERIOR O GASTROINTESTINAL O DE 1 A 4 SEMANAS DESPUES DE LA VACUNACION. PUEDE HABER PARALISIS BIFACIAL',
            ],
            ['name' => 'ENFERMEDAD CEREBROVASCULAR',
             'description' => 'GRUPO DE DISFUNCIONES CEREBRALES QUE DERIVAN DE LOS VASOS SANGUINEOS DEL CEREBRO. ENTRE ELLAS FIGURAN EL ICTUS APOPLETICO O ACCIDENTE CEREBROVASCULAR, QUE COMPRENDE LAS SIGUIENTES ENTIDADES NOSOLOGICAS: HEMORRAGIA INTRACEREBRAL, HEMORRAGIA SUBARACNOIDEA, ACCIDENTE CEREBROVASCULAR ISQUEMICO Y ACCIDENTE CEREBROVASCULAR DE TIPO INDETERMINADO (ISQUEMICO O HEMORRAGICO)',
            ],
        ]);


        $speciality = Speciality::where('name','MEDICINA GENERAL')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'SINTOMAS, SIGNOS O RESULTADOS CLINICOS ANORMALES EN GENERAL',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'FIEBRE DE OTRO ORIGEN O DE ORIGEN DESCONOCIDO',
             'description' => '',
            ],
            ['name' => 'RUMOR DE EPIZOOTIAS',
             'description' => 'ENFERMEDAD INFECTO-CONTAGIOSA DE LOS ANIMALES QUE DETERMINA UN AUMENTO NOTABLE Y RELATIVAMENTE RAPIDO DEL NUMERO DE CASOS EN UNA REGION O TERRITORIO DETERMINADO',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'EFECTOS ADVERSOS DE SUSTANCIAS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'EFECTOS ADVERSOS DE FARMACOS, MEDICAMENTOS U OTRAS SUSTANCIAS BIOLOGICAS',
             'description' => '',
            ],
        ]);
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'CAUSAS EXTERNAS DE MORBILIDAD O MORTALIDAD',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'ACCIDENTE DE TRANSPORTE TERRESTRE',
             'description' => '',
            ],
        ]);



        $speciality = Speciality::where('name','PERINATOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ALGUNAS AFECCIONES QUE SE ORIGINAN EN EL PERIODO PERINATAL',
            'description' => 'EN ESTE CAPITULO SE INCLUYEN DIVERSOS TRASTORNOS QUE TIENEN SU ORIGEN EN EL PERIODO PERINATAL, AUNQUE LAS MANIFESTACIONES O LA MUERTE SOBREVENGAN MAS TARDE',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'SINDROME DE RUBEOLA CONGENITA',
             'description' => 'ENFERMEDAD CAUSADA POR UNA INFECCION INTRAUTERINA POR EL VIRUS DE LA RUBEOLA. SUS SIGNOS Y SINTOMAS DEPENDEN DEL MOMENTO EN QUE SE PRODUCE LA INFECCION DEL FETO; PUEDE CAUSAR ANOMALIAS CONGENITAS (COMO SORDERA) O RETRASO DEL CRECIMIENTO INTRAUTERINO. SE CONTAGIA POR TRANSMISION VERTICAL. EL DIAGNOSTICO DE CONFIRMACION ES POR IDENTIFICACION DEL VIRUS CAUSAL O DETECCION DE ANTICUERPOS IGM ANTIRRUBEOLICOS EN EL RECIEN NACIDO O LACTANTE',
            ],
        ]);


        $speciality = Speciality::where('name','ENDOCRINOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'ENFERMEDADES ENDOCRINAS, NUTRICIONALES O METABOLICAS',
            'description' => '',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'DIABETES MELLITUS',
             'description' => 'TRASTORNO METABOLICO DE CAUSAS HETEROGENEAS QUE SE CARACTERIZA POR UNA HIPERGLUCEMIA CRONICA Y ALTERACIONES DEL METABOLISMO DE LOS HIDRATOS DE CARBONO, LOS LIPIDOS Y LAS PROTEINAS QUE OBEDECEN A UN DEFECTO DE LA SECRECION DE LA INSULINA, DE LA ACTIVIDAD DE ESTA HORMONA, O AMBAS COSAS',
            ],
        ]);


        $speciality = Speciality::where('name','ONCOLOGIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'NEOPLASIAS',
            'description' => 'TERMINO GENERICO QUE DESIGNA UN AMPLIO GRUPO DE ENFERMEDADES QUE PUEDEN AFECTAR A CUALQUIER PARTE DEL ORGANISMO; TAMBIEN SE HABLA DE TUMORES MALIGNOS O NEOPLASIAS MALIGNAS',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'NEOPLASIAS',
             'description' => 'TERMINO GENERICO QUE DESIGNA UN AMPLIO GRUPO DE ENFERMEDADES QUE PUEDEN AFECTAR A CUALQUIER PARTE DEL ORGANISMO; TAMBIEN SE HABLA DE TUMORES MALIGNOS O NEOPLASIAS MALIGNAS',
            ],
        ]);


        $speciality = Speciality::where('name','PSIQUIATRIA')->first();
        
        
        $diseaseClasification = $speciality->diseaseClasifications()->create([
            'name' => 'TRASTORNOS MENTALES, DEL COMPORTAMIENTO Y DEL NEURODESARROLLO',
            'description' => 'LOS TRASTORNOS MENTALES, DEL COMPORTAMIENTO Y DEL NEURODESARROLLO SON SINDROMES QUE SE CARACTERIZAN POR UNA ALTERACION CLINICAMENTE SIGNIFICATIVA EN LA COGNICION, LA REGULACION EMOCIONAL O EL COMPORTAMIENTO DE UN INDIVIDUO QUE REFLEJA UNA DISFUNCION EN LOS PROCESOS PSICOLOGICOS, BIOLOGICOS O DEL DESARROLLO QUE SUBYACEN AL FUNCIONAMIENTO MENTAL Y COMPORTAMENTAL. ESTAS PERTURBACIONES ESTAN GENERALMENTE ASOCIADAS CON MALESTAR O DETERIORO SIGNIFICATIVOS A NIVEL PERSONAL, FAMILIAR, SOCIAL, EDUCATIVO, OCUPACIONAL O EN OTRAS AREAS IMPORTANTES DEL FUNCIONAMIENTO',
        ]);
        $diseaseClasification->diseases()->createMany([
            ['name' => 'TRASTORNOS MENTALES, DEL COMPORTAMIENTO Y DEL NEURODESARROLLO',
             'description' => 'LOS TRASTORNOS MENTALES, DEL COMPORTAMIENTO Y DEL NEURODESARROLLO SON SINDROMES QUE SE CARACTERIZAN POR UNA ALTERACION CLINICAMENTE SIGNIFICATIVA EN LA COGNICION, LA REGULACION EMOCIONAL O EL COMPORTAMIENTO DE UN INDIVIDUO QUE REFLEJA UNA DISFUNCION EN LOS PROCESOS PSICOLOGICOS, BIOLOGICOS O DEL DESARROLLO QUE SUBYACEN AL FUNCIONAMIENTO MENTAL Y COMPORTAMENTAL. ESTAS PERTURBACIONES ESTAN GENERALMENTE ASOCIADAS CON MALESTAR O DETERIORO SIGNIFICATIVOS A NIVEL PERSONAL, FAMILIAR, SOCIAL, EDUCATIVO, OCUPACIONAL O EN OTRAS AREAS IMPORTANTES DEL FUNCIONAMIENTO',
            ],
        ]);

    }
}
