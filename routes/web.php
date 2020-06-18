<?php
use App\Person;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**Route::get('/', function () {
    return view('auth.login');
});*/
/**redirccionamos directo al login */
Route::redirect('/', '/login');

//pruebas de consulta
Route::get('/consulta',function(){
    
    

    /**$analysisTypes = App\AnalysisType::all();
    foreach($analysisTypes as $analysisType){
        echo $analysisType->name.'<br>';
        $analysisGroups = $analysisType->analysisGroups()->get();
        foreach($analysisGroups as $analysisGroup){
            echo $analysisGroup->name.'<br>';
            $itemGroups = $analysisGroup->itemGroups()->get();
            foreach($itemGroups as $itemGroup){
                echo $itemGroup->name.'<br>';
            }
        }
    }*/
    /**$cita = App\Appointment::find(1);
    return $cita->medicalCenter();*/
    /**$clinicalcase=App\ClinicalCase::find(1);
    
    if($clinicalcase){
        $clinicalcase->anamnesisAll();
        return $clinicalcase; 
    }        
    else {

        return 'no existe';
    }*/
    /**$clinicalcase=App\ClinicalCase::find(1);
    
    foreach($clinicalcase->medications as $medication){
        if($medication->status)
        echo $medication->name;
    }*/
    /**$person = App\MedicalCenter::find(1);
    $person->addAddress();
    echo $person->address;*/  
    /**$analysisType = 'subjetivo';
    $analysisGroup = 'personal';
    $i=0;
    $resultado=[];
    $resultado[$analysisType][$analysisGroup][$i]['item'] = 'alegias';
    $resultado[$analysisType][$analysisGroup][$i]['observation'] = 'ahsgdhga';
    $i++;
    $resultado[$analysisType][$analysisGroup][$i]['item'] = 'culo';
    $resultado[$analysisType][$analysisGroup][$i]['observation'] = 'ahsgdhga';
    $analysisType = 'Objetivo';
    $analysisGroup = 'ojo';
    $i=0;
    $resultado[$analysisType][$analysisGroup][$i]['item'] = 'cosa';
    $resultado[$analysisType][$analysisGroup][$i]['observation'] = 'ahsgdhga';
    foreach ($resultado as $analysisType => $analysisGroups) {
        echo $analysisType,count($analysisGroups),'<br>';
        foreach ($analysisGroups as $analysisGroup => $items) {
            echo $analysisGroup,count($items),'<br>';
            foreach ($items as $item) {
                echo $item['item'],'<br>';
                echo $item['observation'],'<br>';
            }
        }
    }*/
    $clinicalcase = App\ClinicalCase::find(1);
    $clinicalcase->anamnesisAll2();
    foreach ($clinicalcase->anamnesis as $analysisType => $analysisGroups) {
        echo $analysisType;
        foreach ($analysisGroups as $analysisGroup => $items) {
            echo $analysisGroup;
            foreach ($items as $item) {
                echo $item->item,'<br>';
                echo $item->observation,'<br>';
            }
        }
    }
    
});

Route::get('/medical-history', function () {
    return view('person.medical-history');
});
Route::any('doctor/medical-discharge','DoctorController@medicalDischarge');

Route::get('/summary',function(){
    return view('person.summary');
});

Route::get('/profile', function () {
    return view('person.profile');
});
//ruta para busqueda de pacientes en la cuenta de doctor
Route::any('doctor/search', 'DoctorController@search')->name('search');
//prueva de busqueda autocompletada
Route::get('/search', 'PersonController@search')->name('patient.search');
//ruta para buscar medicamentos
Route::get('/search/presentation', 'PresentationController@search')->name('presentation');
//ruta para mostrar informacion de un pasiente en la cuenta del doctor
Route::post('doctor/patient/', 'DoctorController@patient')->name('patient');
//ruta para mostrar un caso clinico de un pasiente en la cuenta del doctor
Route::post('doctor/clinicalCase/', 'DoctorController@clinicalCase')->name('clinicalCase');


/**Route::any('/search', function () {
    $q = Request::get('busqueda');
    $user = Person::where('name', 'LIKE', '%' . $q . '%')->orWhere('cedula', 'LIKE', '%' . $q . '%')->orWhere('last_name', 'LIKE', '%' . $q . '%')->get();
    if (count($user) > 0)
        return view('person.search')->withDetails($user)->withQuery($q);
    else return view('person.search')->withMessage('No encontrado');
});*/

Route::get('/anamnesis',function(){
    return view('doctor.anamnesis');
});

Route::get('/diary',function(){
    return view('doctor.diary');
});

Route::get('/medical-record',function(){
    return view('person.medical-record');
});

Route::get('/medical-order',function(){
    return view('person.medical-order');
});

/* NURSE ROUTES */
Route::get('nurse/health-care','NurseController@healthCare');
Route::get('nurse/patient-evolution','NurseController@patientEvolution');
Route::get('nurse/patient-discharge','NurseController@patientDischarge');
Route::get('nurse/vital-sign','NurseController@vitalSign');
Route::get('nurse/medication','NurseController@medicationView');

/*
Route::get('/vital-sign',function(){
    return view('nurse.vital-sign');
});
Route::get('/medication',function(){
    return view('nurse.medication');
});

*/


Route::get('/patient-tracking','DoctorController@patient_tracking');

/* MEDICAL JUSTIFICATIONS */ 
Route::get('/search-medical-justification',function(){
    return view('person.search-medical-justification');
});
Route::get('/medical-justification/{id}','MedicalJustificationController@medicalJustification');
Route::get('/medical-justification-print/{id}','MedicalJustificationController@printMedicalJustification');

/*END NURSE ROUTES*/
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'PersonController@vista');

/** rutas del sistema */
Route::resource('doctor','DoctorController');
Route::resource('nurse','NurseController');
Route::resource('secretary','SecretaryController');
Route::resource('person','PersonController');

/** Rutas AJX */
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Headers:  accept, content-type, x-xsrf-token, x-csrf-token, _token');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');

/** Registro de Anamnesis **/
Route::get('GetItemsAnamnesis','AnamnesisRecordController@getItems');
Route::post('SetItemsAnamnesis','AnamnesisRecordController@setItems');

/** Cargar el Dom de las ordenes **/
Route::get('/medical_order_anamnesis',function(){
    return view('person.medical-order');
});
Route::post('GetOrdenesMedicas','AnamnesisRecordController@GetOrdenesMedicas');
Route::get('Discharge-Order/{id}','DoctorController@discharge_order');
Route::post('SetDischarge','DoctorController@discharge_set');

/** Registro de Ordenes de Medicamento **/
Route::post('SetOrdenMedicamento','AnamnesisRecordController@setMedicamento');
Route::get('GeteditCardMedicamentoId','AnamnesisRecordController@geteditMedicamentoId');
Route::post('UpdateOrdenMedicamento','AnamnesisRecordController@updateeditMedicamentoId');
Route::post('DeleteMedicamento','AnamnesisRecordController@updatedeletMedicamentoId');

/** Registro de Ordenes de Cuidado **/
Route::post('SetOrdenCuidado','AnamnesisRecordController@setCuidado');
Route::get('GeteditCardCuidadoId','AnamnesisRecordController@geteditCuidadoId');
Route::post('UpdateOrdenCuidado','AnamnesisRecordController@updateeditCuidadoId');
Route::post('DeleteCuidado','AnamnesisRecordController@updatedeletCuidadoId');

/** Registro de Ordenes de Examen **/
Route::post('SetOrdenExamen','AnamnesisRecordController@setExamen');
Route::get('GeteditCardExamenId','AnamnesisRecordController@geteditExamenId');
Route::post('UpdateOrdenExamen','AnamnesisRecordController@updateeditExamenId');
Route::post('DeleteExamen','AnamnesisRecordController@updatedeletExamenIId');

/** Registro de Ordenes de Interconsulta **/
Route::post('SetOrdenInterconsulta','AnamnesisRecordController@setInterconsulta');
Route::get('GeteditCardInterconsultaId','AnamnesisRecordController@geteditInterconsultaId');
Route::post('UpdateOrdenInterconsulta','AnamnesisRecordController@updateeditInterconsultaId');
Route::get('GetDoctorInterconsulta','AnamnesisRecordController@getDoctorInter');


/** Registrar los Signos Vitales de los pacientes Por la Enfermera**/
Route::get('GetListadoPaciente','VitalSignController@getPaciente');
Route::get('GetListadoPacienteId','VitalSignController@getPacienteId');
Route::get('GetDatosEnfermera','VitalSignController@getEnfermera');
Route::post('setVitalSign','VitalSignController@setVitalSign');

/** Registrar los Cuidados  de los pacientes Por la Enfermera**/
Route::get('GetListadoPacienteCuidado','HealthCareController@getPaciente');
Route::get('GetListadoPacienteCuidadoId','HealthCareController@getPacienteId');
Route::post('setHealthCare','HealthCareController@setHealthCare');

/** Registrar los Medicamento de los pacientes Por la Enfermera**/
Route::get('GetListadoPacienteMedicamento','MedicationController@getPaciente');
Route::get('GetListadoPacienteMedicamentoId','MedicationController@getPacienteId');
Route::post('setMedication','MedicationController@setMedication');


/** Registrar los Reportes de los pacientes Por la Enfermera**/
Route::get('GetListadoPacienteReporte','NurseController@getPaciente');
Route::get('GetListadoPacienteReporteId','NurseController@getPacienteId');
Route::post('setEvolution','NurseController@setEvolution');
Route::get('GetListadoPacienteEgreso','NurseController@getPacienteEgreso');
Route::get('GetListadoPacienteEgresoId','NurseController@getPacienteEgresoId');
Route::post('NurseDischargeOrder','NurseController@setPacienteEgreso');


/** Listado de paciente**/
Route::post('listAppointment','DoctorController@listAppointment');
Route::post('listAppointmentId','DoctorController@listAppointmentId');
Route::post('SetConsultation','DoctorController@SetConsultation');
Route::post('VerificarConsulta','DoctorController@VerificarConsulta');
Route::get('RealizarAnamnesis/{id}','DoctorController@RealizarAnamnesis');
Route::get('Consultation/{id}','DoctorController@consultation_id');
Route::get('GetAllergiesDiseases','DoctorController@allergies_diseases');
Route::get('GetCompuesto','DoctorController@get_compuesto');
Route::get('diseaseSearch','DoctorController@diseases_search');


Route::get('listPatient','DoctorController@listPatient_tracking');
    


Route::get('patientForm','secretaryController@patientForm');
Route::get('secretaryAppointmentList','secretaryController@appointmentList');
Route::get('patientFormSearch','personController@patientFormSearch');

Route::get('stateSelect','locationController@stateSelect');
Route::get('municipalitySelect','locationController@municipalitySelect');
Route::get('citySelect','locationController@citySelect');
Route::get('parishSelect','locationController@parishSelect');
Route::get('sectorSelect','locationController@sectorSelect');