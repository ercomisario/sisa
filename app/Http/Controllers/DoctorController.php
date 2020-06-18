<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Person;
use App\ClinicalCase;
use App\MedicalConsultation;

class DoctorController extends PersonController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;

        //$request = $request;
        return view('doctor.diary', compact(['user','person','doctor']));
    }

    public function search(Request $request){
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;
        if($request->busqueda && ($request->busqueda != '')){

            $q = $request->busqueda;
            $patients = Person::where('name', 'LIKE', '%' . $q . '%')
                    ->orWhere('cedula', 'LIKE', '%' . $q . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $q . '%')->get();

            foreach ($patients as $patient) {
                $patient->age = $this->calculateAge($patient->birthday);
                $patient->birthday = $this->formatfecha2($patient->birthday);
            }
            
            if (count($patients) > 0)
                return view('person.search', compact(['user','person','doctor','patients']))->withQuery($q);
            else 
                return view('person.search', compact(['user','person','doctor']))->withMessage('No encontrado');
        }
        else{
            $patients= false;
            return view('person.search', compact(['user','person','doctor','patients']));
        }
    }
    public function patient(Request $request){
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;        
        $patient = Person::find($request->patient_id);
        $patient['age'] = $this->calculateAge($patient->birthday);
        if($patient->clinicalCases){
            $clinicalCases = $patient->clinicalCases()->get();
            foreach($clinicalCases as $clinicalCase){
                $clinicalCase->cardInfo();
            }
           
        }
        else{
            $clinicalCases = false;
        }
        return view('person.medical-history', compact(['user','person','doctor','patient','clinicalCases']));
    }
    public function clinicalCase(Request $request){
        $user = $request->user();
        $person = $user->person;
        $patient = Person::find($request->patient_id);
        $patient->age = $this->calculateAge($patient->birthday);

        // $clinicalCaseActive = ClinicalCase::find($request->clinicalCase_id);
        $clinicalCaseActive = ClinicalCase::with(['medicalEvolutions','nurseReports','vitalSigns','medicalJustification','referrals','medicalTests','healthCares','medicalDischarges','medications'])->find($request->clinicalCase_id);
        $clinicalCaseActive->cardInfo();
        $clinicalCaseActive->anamnesisAll();
        if($patient->clinicalCases){
            $clinicalCases = $patient->clinicalCases()->get();
            foreach($clinicalCases as $clinicalCase){
                $clinicalCase->cardInfo();
            }
           
        }
        return view('person.summary',compact(['user','person','clinicalCaseActive','patient','clinicalCases']));
    }

    public function listAppointment(Request $request){

        //$json = $request->datos;
        //$date=date('Y-m');
        $date = Carbon::now();
        $dateStart = $date;
        $dateStart = $dateStart->format('Y-m-d');
        $dateEnd =  $date->addDays(6);
        $dateEnd = $dateEnd->format('Y-m-d');
        //$dateStart->format('d-m-Y');
        //$date_l=$date.'-'.$json[0]['L'];
        //$date_d=$date.'-'.($json[6]['D']+1);
        //$arrayLista=array();

        //DATOS DE
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;

        $citas = $doctor->medicalConsultations()
                        ->select('reason','agreeded_date','id as medical_consultation_id','person_id')
                        ->with('person:id,name,last_name,cedula')
                        ->doesntHave('medicalReport')
                        ->whereBetween('agreeded_date', [$dateStart,$dateEnd])
                        ->orderBy('agreeded_date', 'asc')
                        ->get();
                      
        
        
        
        $users = DB::table('medical_consultations')
                 ->select('medical_consultations.reason','medical_consultations.agreeded_date','people.name','people.last_name','medical_consultations.id as medical_consultation_id','people.cedula')
                 ->leftJoin('people', 'people.id', '=', 'medical_consultations.person_id')
                 ->whereRaw('(SELECT COUNT(*) FROM medical_reports WHERE medical_reports.medical_consultation_id = medical_consultations.id ) = 0 ')
                 //->whereBetween('agreeded_date', array($date_l,$date_d))
                 ->whereBetween('agreeded_date', ['2020-03-02','2020-03-08'])
                 ->where('medical_consultations.doctor_id', '=', $doctor->id)
                 ->orderBy('medical_consultations.agreeded_date', 'asc')
                 ->get();
                 
        return array('users' => $citas, 'fecha' => date('Y-m-d'));
        // return array('users' => $users, 'fecha' => '2019-11-10');
    }

    public function listAppointmentId(Request $request){

        $id = $request->datos['id'];
        $users = DB::table('medical_consultations')
                 ->select('medical_consultations.reason','medical_consultations.agreeded_date','people.name','people.last_name','people.id as person_id','medical_consultations.id as medical_consultation_id','people.cedula')
                 ->leftJoin('people', 'people.id', '=', 'medical_consultations.person_id')
                ->whereRaw('(SELECT COUNT(*) FROM medical_reports WHERE medical_reports.medical_consultation_id = medical_consultations.id ) = 0 ')
                 ->where('medical_consultations.id', '=', $id)
                 ->orderBy('medical_consultations.agreeded_date', 'asc')
                 ->get();

        $aux = get_object_vars($users[0]);

        $enfermedadBase = DB::table('important_anamnesis_observations')
                 ->select('important_item_groups.name','important_anamnesis_observations.description')
                 ->Join('important_item_groups', 'important_item_groups.id', '=', 'important_anamnesis_observations.important_item_group_id')
                 ->Join('medical_records', 'medical_records.id', '=', 'important_anamnesis_observations.medical_record_id')
                 ->Join('people', 'people.id', '=', 'medical_records.person_id')
                 ->where('person_id', '=', $aux['person_id'])
                 ->get();

        return array('users' => $users[0],'enfermedadBase' => $enfermedadBase, 'fecha' => date('Y-m-d'));
    }

    public function SetConsultation(Request $request){
        
        $json = $request->datos;

        $medical_consultation_id = $json['medical_consultation_id'];
        $descripcion = $json['descripcion'];
        $file = $json['file'];
        $hallazgo = $json['hallazgo'];
        $admision = $json['admision'];
        $diagnostico = $json['diagnostico'];
        $patologia = $json['patologia'];
        $doctor_id = $json['doctor_id'];


        $fecha_justificativo = $json['fecha_justificativo'];
        $description_justificativo = $json['description_justificativo'];

        $arrayFechaJustifi= explode("-",$fecha_justificativo);
        $fecha_inicio=$this->formatfecha(trim($arrayFechaJustifi[0]));
        $fecha_fin=$this->formatfecha(trim($arrayFechaJustifi[1]));

        //medical_reports
        $datos = array(
            'created_at'   => date('Y-m-d H-i-s'),
            'updated_at'  => date('Y-m-d H-i-s'),
            'diagnostic'  => $diagnostico,
            'disease_id'  => $patologia,
            'medical_consultation_id'  => $medical_consultation_id
        );
        $medical_report_id = DB::table('medical_reports')->insertGetId($datos);


        //necesito obtener el id del registro medico de esa persona 'medical_records'
        $users = DB::table('medical_consultations')->select('medical_records.id as medical_record_id','medical_consultations.person_id as person_id','medical_consultations.agreeded_date','medical_consultations.reason','medical_consultations.secretary_id','people.id as person_id')
                 ->Join('medical_records', 'medical_records.person_id', '=', 'medical_consultations.person_id')
                 ->Join('people', 'people.id', '=', 'medical_consultations.person_id')
                 ->where('medical_consultations.id', '=', $medical_consultation_id)
                 ->get();

        $aux = get_object_vars($users[0]);

        //caso clinico 'clinical_cases'
        $datos = array(
            'created_at'   => date('Y-m-d H-i-s'),
            'updated_at'  => date('Y-m-d H-i-s'),
            'status'  => $admision,
            'medical_record_id'  => $aux['medical_record_id'],
            'medical_report_id'  => $medical_report_id
        );
        $clinical_case_id = DB::table('clinical_cases')->insertGetId($datos);


        // Ordenes         
        if(!empty($json['json_medicamento'])){
            $json_medicamento = $json['json_medicamento'];

            for ($i=0; $i < count($json_medicamento); $i++) { 
                # code...
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'doctor_id'  => $doctor_id,
                    'clinical_case_id'  => $clinical_case_id
                );
                $medical_order_id = DB::table('medical_orders')->insertGetId($datos);            

                $datos = array(
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "dose" => $json_medicamento[$i]['dosis'],
                    "frequency" => $json_medicamento[$i]['frecuencia'],
                    "presentation_Id" => $json_medicamento[$i]['presentation_Id'],
                    "start_time" => $json_medicamento[$i]['fecha_inicio'],
                    "end_time" => $json_medicamento[$i]['fecha_fin'],
                    "status" => 1,
                    "medical_order_id" => $medical_order_id
                );

                $medication_id = DB::table('medications')->insertGetId($datos);
            }

        }
        if(!empty($json['json_cuidado'])){
            $json_cuidado = $json['json_cuidado'];

            for ($i=0; $i < count($json_cuidado); $i++) { 
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'doctor_id'  => $doctor_id,
                    'clinical_case_id'  => $clinical_case_id
                );
                $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                


                $datos = array(
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "start_date" => date('Y-m-d H:i:s'),
                    "description" => $json_cuidado[$i]['descripcion'],
                    "status" => 1,
                    "medical_order_id" => $medical_order_id
                );

                $medication_id = DB::table('health_cares')->insertGetId($datos);
            }

        }

        if(!empty($json['json_examen'])){
            $json_examen = $json['json_examen'];

            for ($i=0; $i < count($json_examen); $i++) { 
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'doctor_id'  => $doctor_id,
                    'clinical_case_id'  => $clinical_case_id
                );
                $medical_order_id = DB::table('medical_orders')->insertGetId($datos); 


                $datos = array(
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "test_type" => $json_examen[$i]['tipo_examen'],
                    "reason" => $json_examen[$i]['descripcion'],
                    "status" => 1,
                    "medical_order_id" => $medical_order_id
                );

                $medication_id = DB::table('medical_tests')->insertGetId($datos);
            }
        }

        //Justificativo medico 'medical_justifications'
        if(!empty($description_justificativo)){

            $datos = array(
                'created_at'   => date('Y-m-d H-i-s'),
                'updated_at'  => date('Y-m-d H-i-s'),
                'start_date'  => $fecha_inicio,
                'end_date'  => $fecha_fin,
                'qr_code'  => '',
                'qr_path'  => '',
                'description'  => $description_justificativo,
                'clinical_case_id'  => $clinical_case_id,
            );
            $medical_justification_id = DB::table('medical_justifications')->insertGetId($datos);
        

            $qr_path="../public/img/qrcodes/".$aux['person_id']."-".$medical_justification_id.date('Y-m-d H-i-s').'.png';

            $qr_path_db="img/qrcodes/".$aux['person_id']."-".$medical_justification_id.date('Y-m-d H-i-s').'.png';
            QrCode::format('png')->size(250)->generate("http://192.168.0.21:8000/medical-justification/".$medical_justification_id,$qr_path);

            $datos = array(
                "created_at" => date('Y-m-d H-i-s'),
                "updated_at" => date('Y-m-d H-i-s'),
                "qr_code"  => $medical_justification_id,
                "qr_path"  => $qr_path_db
            );

            DB::table('medical_justifications')
                 ->where('id', '=', $medical_justification_id)
                 ->update($datos);
        }

        if($admision == 1){
            //ACTIVO EL RANDO DE admissions
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'reason'  => $aux['reason'],
                    'agreeded_date'  => date('Y-m-d H:i:s'),
                    'status'  => 1,
                    'medical_report_id'  => $medical_report_id
                );
                $medical_order_id = DB::table('admissions')->insertGetId($datos); 
        }
   
        return array();
    }

    /**
     * @param $date
     * @return mixed
     */
    public function formatfecha($date){
        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $ano) = explode("/", $date);
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $ano) = explode("-", $date);
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($ano, $mes, $dia) = explode("-", $date);
        }

        //$valor=explode("/",trim($date));
        $fecha = $ano . '-' . $mes . '-' . $dia;
        return $fecha;
    }

    public function medicalDischarge(Request $request){
        $user = $request->User();
        $person = $user->person;
        $patient = Person::find($request->patient_id);

        return view('doctor.medical-discharge',compact(['user','person','patient']));
    }

    public function VerificarConsulta(Request $request){
        # code...
        $json = $request->datos;
        $cita =  MedicalConsultation::find($json['medical_consultation_id']);
        $person= Person::find($cita->person_id);
        $clinicalCases = $person->clinicalCases()->get()->last();
        
        if(!empty($clinicalCases)){
            if($clinicalCases['status'] == 1){
                $clinicalCaseActive = ClinicalCase::with(['medicalEvolutions','nurseReports','vitalSigns','medicalJustification','referrals','medicalTests','healthCares','medicalDischarges','medications'])->find($clinicalCases->id);
                $clinicalCaseActive->cardInfo();
                $clinicalCaseActive->anamnesisAll();
                $clinicalCaseActive->person=$person;
                return $clinicalCaseActive;
            }
        }
        return array();

    }

    public function RealizarAnamnesis(Request $request)
    {
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;
        $clinical_case = ClinicalCase::find($request->id);
        $patient = $clinical_case->medicalRecord()->first()->person;
        // return $patient;
        return view('doctor.anamnesis', compact(['user','person','doctor','clinical_case','patient']));
    }

    public function consultation_id(Request $request)
    {
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;
        $cita = MedicalConsultation::find($request->id);
        //$patient = $cita->person()->first();
        $patient = $cita->person;

        // return $cita;
        return view('doctor.consultation', compact(['user','person','doctor','cita']));
        
    }

    public function discharge_order(Request $request)
    {
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;
        $clinical_case = ClinicalCase::find($request->id);
        $patient = $clinical_case->medicalRecord()->first()->person;

       // return $clinical_case;
        return view('doctor.discharge-order', compact(['user','person','doctor','clinical_case','patient']));
        
    }

    public function discharge_set(Request $request)
    {
       $json = $request->datos;
       $clinical_case_id = $json['clinical_case_id'];
       $doctor_id = $json['doctor_id'];

       
       $tipoEgreso = $json['tipoEgreso'];
       $diagnosticoEgreso = $json['diagnosticoEgreso'];
       $resumenEgreso = $json['resumenEgreso'];
       $razonEgreso = $json['razonEgreso'];

       $fecha_justificativo = $json['daterangeJustificativo'];
       $description_justificativo = $json['descriptionJustificativo'];

       $arrayFechaJustifi= explode("-",$fecha_justificativo);
       $fecha_inicio=$this->formatfecha(trim($arrayFechaJustifi[0]));
       $fecha_fin=$this->formatfecha(trim($arrayFechaJustifi[1]));

        // Ordenes
       $datos = array(
           'created_at'   => date('Y-m-d H:i:s'),
           'updated_at'  => date('Y-m-d H:i:s'),
           'doctor_id'  => $doctor_id,
           'status_discharge' => 1,
           'clinical_case_id'  => $clinical_case_id
       );
       $medical_order_id = DB::table('medical_orders')->insertGetId($datos); 

       $datos = array(
           'created_at'   => date('Y-m-d H:i:s'),
           'updated_at'  => date('Y-m-d H:i:s'),
           'final_diagnostic'  => $diagnosticoEgreso,
           'summary'  => $resumenEgreso,
           'type'  => $tipoEgreso,
           'reason'  => $razonEgreso,
           "status" => 1,
           'medical_order_id'  => $medical_order_id
       );
       $medical_discharge_id = DB::table('medical_discharges')->insertGetId($datos); 

       if(!empty($json['json_medicamento'])){
           $json_medicamento = $json['json_medicamento'];

           for ($i=0; $i < count($json_medicamento); $i++) { 
               # code...
               $datos = array(
                   'created_at'   => date('Y-m-d H:i:s'),
                   'updated_at'  => date('Y-m-d H:i:s'),
                   'doctor_id'  => $doctor_id,
                   'status_discharge' => 1,
                   'clinical_case_id'  => $clinical_case_id
               );
               $medical_order_id = DB::table('medical_orders')->insertGetId($datos);            

               $datos = array(
                   "created_at" => date('Y-m-d H:i:s'),
                   "updated_at" => date('Y-m-d H:i:s'),
                   "dose" => $json_medicamento[$i]['dosis'],
                   "frequency" => $json_medicamento[$i]['frecuencia'],
                   "administer_route" => $json_medicamento[$i]['administer_route'],
                   "name" => $json_medicamento[$i]['compuesto'],
                   "start_time" => $json_medicamento[$i]['fecha_inicio'],
                   "end_time" => $json_medicamento[$i]['fecha_fin'],
                   "status" => 1,
                   "medical_order_id" => $medical_order_id
               );

               $medication_id = DB::table('medications')->insertGetId($datos);
           }

       }
       if(!empty($json['json_cuidado'])){
           $json_cuidado = $json['json_cuidado'];

           for ($i=0; $i < count($json_cuidado); $i++) { 
               $datos = array(
                   'created_at'   => date('Y-m-d H:i:s'),
                   'updated_at'  => date('Y-m-d H:i:s'),
                   'doctor_id'  => $doctor_id,
                   'status_discharge' => 1,
                   'clinical_case_id'  => $clinical_case_id
               );
               $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                


               $datos = array(
                   "created_at" => date('Y-m-d H:i:s'),
                   "updated_at" => date('Y-m-d H:i:s'),
                   "start_date" => date('Y-m-d H:i:s'),
                   "description" => $json_cuidado[$i]['descripcion'],
                   "status" => 1,
                   "medical_order_id" => $medical_order_id
               );

               $medication_id = DB::table('health_cares')->insertGetId($datos);
           }

       }

       if(!empty($json['json_examen'])){
           $json_examen = $json['json_examen'];

           for ($i=0; $i < count($json_examen); $i++) { 
               $datos = array(
                   'created_at'   => date('Y-m-d H:i:s'),
                   'updated_at'  => date('Y-m-d H:i:s'),
                   'doctor_id'  => $doctor_id,
                   'status_discharge' => 1,
                   'clinical_case_id'  => $clinical_case_id
               );
               $medical_order_id = DB::table('medical_orders')->insertGetId($datos); 


               $datos = array(
                   "created_at" => date('Y-m-d H:i:s'),
                   "updated_at" => date('Y-m-d H:i:s'),
                   "test_type" => $json_examen[$i]['tipo_examen'],
                   "reason" => $json_examen[$i]['descripcion'],
                   "status" => 1,
                   "medical_order_id" => $medical_order_id
               );

               $medication_id = DB::table('medical_tests')->insertGetId($datos);
           }
       }

       //Justificativo medico 'medical_justifications'
       if(!empty($description_justificativo)){

           $datos = array(
               'created_at'   => date('Y-m-d H-i-s'),
               'updated_at'  => date('Y-m-d H-i-s'),
               'start_date'  => $fecha_inicio,
               'end_date'  => $fecha_fin,
               'qr_code'  => '',
               'qr_path'  => '',
               'description'  => $description_justificativo,
               'clinical_case_id'  => $clinical_case_id,
           );
           $medical_justification_id = DB::table('medical_justifications')->insertGetId($datos);
       

           $qr_path="../public/img/qrcodes/".$medical_justification_id.date('Y-m-d H-i-s').'.png';

           $qr_path_db="img/qrcodes/".$medical_justification_id.date('Y-m-d H-i-s').'.png';
           QrCode::format('png')->size(250)->generate("http://192.168.0.21:8000/medical-justification/".$medical_justification_id,$qr_path);

           $datos = array(
               "created_at" => date('Y-m-d H-i-s'),
               "updated_at" => date('Y-m-d H-i-s'),
               "qr_code"  => $medical_justification_id,
               "qr_path"  => $qr_path_db
           );

           DB::table('medical_justifications')
                ->where('id', '=', $medical_justification_id)
                ->update($datos);
       }
      
       return array();
    }

    public function patient_tracking(Request $request)
    {
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;

        
        return view('nurse.patient-tracking', compact(['user','person','doctor']));
    }

    public function listPatient_tracking(Request $request){

        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;
        
        $users = DB::table('medical_consultations')
                 ->select('medical_consultations.reason','medical_consultations.agreeded_date','people.name','people.last_name','medical_consultations.id as medical_consultation_id','people.cedula')
                 ->Join('people', 'people.id', '=', 'medical_consultations.person_id')
                 ->Join('medical_records', 'medical_records.person_id', '=', 'people.id')
                 ->Join('medical_reports', 'medical_reports.medical_consultation_id', '=', 'medical_consultations.id')
                 ->Join('clinical_cases', 'medical_reports.id', '=', 'clinical_cases.medical_report_id')
                 ->where('clinical_cases.status', '=' ,'1')
                 ->whereRaw('(SELECT COUNT(*) FROM medical_orders join medical_discharges on medical_discharges.medical_order_id = medical_orders.id  WHERE medical_orders.clinical_case_id = clinical_cases.id ) = 0 ')
                 ->where('medical_consultations.doctor_id', '=', $doctor->id)
                 ->orderBy('medical_consultations.agreeded_date', 'asc') 
                 ->get();

        return $users;

    }

    function formatfecha2($date){
        list($ano, $mes, $dia) = explode("-", $date);
        $fecha = $dia . '/' . $mes . '/' . $ano;
        return $fecha;
    }

     //funcion para la busqueda autocompletada
    public function diseases_search(Request $request)
    {
        $q=$request->search;
        $user = $request->user();
        $person = $user->person;
        $doctor = $person->doctor;

        $diseases = DB::table('diseases')
                 ->select('diseases.id','diseases.name')
                 ->Join('disease_clasifications', 'diseases.disease_clasification_id','=','disease_clasifications.id' )
                 ->where('speciality_id', '=', $doctor->speciality_id)
                 ->where('diseases.name', 'LIKE', '%' . $q . '%')
                 ->orderBy('diseases.name', 'asc') 
                 ->get();

        return \response()->json($diseases);
    }

   public function allergies_diseases(Request $request){
      $json = $request->datos;
      
      $id = $json['person_id'];

      $users = DB::table('important_anamnesis_observations')
               ->select('important_item_groups.name','important_anamnesis_observations.description')
               ->Join('important_item_groups', 'important_item_groups.id', '=', 'important_anamnesis_observations.important_item_group_id')
               ->Join('medical_records', 'medical_records.id', '=', 'important_anamnesis_observations.medical_record_id')
               ->Join('people', 'people.id', '=', 'medical_records.person_id')
               ->where('person_id', '=', $id)
               ->get();

     return $users;
   }

   public function get_compuesto(Request $request){
       # code...
        $json = $request->datos;    
        $id = $json['presentation_Id'];

        $medications = DB::table('presentations')
                  ->select('components.name as compuesto','presentations.id as presentation_id','unit_measurement','presentations.description','indication','contraindication','presentation_types.name as presentationType','administer_routes.name as administerRoute')
                 ->join('components', 'components.id', '=', 'presentations.component_id')
                 ->join('presentation_types', 'presentation_types.id', '=', 'presentations.presentation_type_id')
                 ->join('administer_routes', 'administer_routes.id', '=', 'presentations.administer_route_id')
                 ->where('presentations.id', '=', $id)
                 ->get();

        return $medications;
   }
}
