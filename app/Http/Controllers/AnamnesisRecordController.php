<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AnalysisType;
use App\ClinicalCase;

class AnamnesisRecordController extends Controller
{
    //

    public function getItems(){

    	$results = array(); // almacenar todo la informacion agrupada deasde tipo de analisis,grupos e itmes
		
		// $analysisTypes = AnalysisType::all();
		// $results['analysisTypes']=$analysisTypes;

		// for ($i=0; $i <count($analysisTypes) ; $i++) { 
		// 	$analysisGroups = $analysisTypes[$i]->analysisGroups()->get();
		// 	$results['analysisTypes'][$i]['analysisGroups']=$analysisGroups;

		// 	for ($k=0; $k <count($analysisGroups) ; $k++) { 
		// 		$itemGroups = $analysisGroups[$k]->itemGroups()->get();
		// 		$results['analysisTypes'][$i]['analysisGroups'][$k]['itemGroups']=$itemGroups;
		// 	}
		// }

        $analysisTypes['analysisTypes'] = DB::table('analysis_types')->select('*')->get();         
        for ($i=0; $i <count( $analysisTypes['analysisTypes']) ; $i++) { 
            $analysisTypes['analysisTypes'][$i]->analysisGroups = DB::table('analysis_groups')->select('*')->where('analysis_type_id', '=', $analysisTypes['analysisTypes'][$i]->id)->get();
        }

        for ($i=0; $i <count( $analysisTypes['analysisTypes']) ; $i++) { 
            for ($j=0; $j <count($analysisTypes['analysisTypes'][$i]->analysisGroups) ; $j++) { 

                $analysisTypes['analysisTypes'][$i]->analysisGroups[$j]->itemGroups = DB::table('item_groups')->select('*')->where('analysis_group_id', '=', $analysisTypes['analysisTypes'][$i]->analysisGroups[$j]->id)->get();

                $analysisTypes['analysisTypes'][$i]->analysisGroups[$j]->itemGroupsImportant = DB::table('important_item_groups')->select('*')->where('analysis_group_id', '=', $analysisTypes['analysisTypes'][$i]->analysisGroups[$j]->id)->get();
            }
        }


		return $analysisTypes;

    }

    public function setItems(Request $request){
        
        $json = $request->datos;
        $clinical_case_id = $json['clinical_case_id'];        

        $clinical_cases = DB::table('clinical_cases')->select('*')
                 ->where('id', '=', $clinical_case_id)
                 ->get();

        $aux = get_object_vars($clinical_cases[0]);

        $datos = array(
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            'clinical_case_id'  => $clinical_case_id
        );
        $anamnesis_record_id = DB::table('anamnesis_records')->insertGetId($datos);

    	

        for ($i=0; $i < count($json['json']); $i++) { 
            if($json['json'][$i]['checked'] == true ){

                if(empty($json['json'][$i]['descripcion'])){
                    $descripcion='';
                }else{
                    $descripcion=$json['json'][$i]['descripcion'];
                }
                
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'anamnesis_record_id'  => $anamnesis_record_id,
                    'description'  => $descripcion,
                    'item_group_id' => $json['json'][$i]['id']
                );
                DB::table('anamnesis_observations')->insert($datos);                
            }
        }

        for ($i=0; $i < count($json['json_important']); $i++) { 
            if($json['json_important'][$i]['checked'] == true ){

                if(empty($json['json_important'][$i]['descripcion'])){
                    $descripcion='';
                }else{
                    $descripcion=$json['json_important'][$i]['descripcion'];
                }
                
                $datos = array(
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s'),
                    'medical_record_id'  => $aux['medical_record_id'],
                    'anamnesis_record_id'  => $anamnesis_record_id,
                    'description'  => $descripcion,
                    'important_item_group_id' => $json['json_important'][$i]['id']
                );
                DB::table('important_anamnesis_observations')->insert($datos);                
            }
        }

		return $json['clinical_case_id'];

    }

    public function setMedicamento(Request $request){
    	$json = $request->datos;
        
      
        $datos = array(
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            'doctor_id'  => $json['doctor_id'],
            'clinical_case_id'  => $json['clinical_case_id']
        );
        $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                

        
        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "dose" => $json['dosis'],
            "frequency" => $json['frecuencia'],
            "administer_route" => $json['administer_route'],
            "name" => $json['compuesto'],
            "start_time" => $json['fecha_inicio'],
            "end_time" => $json['fecha_fin'],
            "status" => 1,
            "medical_order_id" => $medical_order_id
        );

        $medication_id = DB::table('medications')->insertGetId($datos);

        $users = DB::table('people')->select('people.last_name as doc_name')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $medication_id,
            "compuesto"=> $json['compuesto'],
            "dosis"=>  $json['dosis'],
            "frecuencia"=>  $json['frecuencia'],
            "administer_route"=>  $json['administer_route'],
            "fecha_inicio"=> $json['fecha_inicio'],
            "fecha_fin"=> $json['fecha_fin'],
            "nombre_doctor"=> $aux['doc_name']
        );

		return $json;

    }

    public function geteditMedicamentoId(Request $request){
    	$json = $request->datos;
    	
        $medications = DB::table('medications')
                  ->select('medications.id','dose','frequency','start_time','end_time','components.name as compuesto','presentation_id','unit_measurement','presentations.description','indication','contraindication','presentation_types.name as presentationType','administer_routes.name as administerRoute')
                 ->join('presentations', 'presentations.id', '=', 'medications.presentation_id')
                 ->join('components', 'components.id', '=', 'presentations.component_id')
                 ->join('presentation_types', 'presentation_types.id', '=', 'presentations.presentation_type_id')
                 ->join('administer_routes', 'administer_routes.id', '=', 'presentations.administer_route_id')
                 ->where('medications.id', '=', $json['id'])
                 ->get();

        $aux = get_object_vars($medications[0]);

        $arrayFechaInicio = explode(" ",$aux['start_time']);
        $fecha_inicio = trim($arrayFechaInicio[0]);

        $arrayFechaFin = explode(" ",$aux['end_time']);
        $fecha_fin = trim($arrayFechaInicio[0]);

    	$json = array(
            "id"=> $aux['id'],
            "compuesto"=>  $aux['compuesto'],
            "dosis"=>  $aux['dose'],
            "frecuencia"=>  $aux['frequency'],
            "fecha_inicio"=> $fecha_inicio,
            "fecha_fin"=> $fecha_fin,
            "presentation_id"=>  $aux['presentation_id'],
            "unit_measurement"=>  $aux['unit_measurement'],
            "description"=>  $aux['description'],
            "indication"=>  $aux['indication'],
            "contraindication"=>  $aux['contraindication'],
            "presentationType"=>  $aux['presentationType'],
            "administerRoute"=>  $aux['administerRoute'],
        );

        $idPerson = DB::table('medications')
                  ->select('medical_records.person_id')
                 ->join('medical_orders','medical_orders.id', '=', 'medications.medical_order_id')
                 ->join('clinical_cases', 'clinical_cases.id', '=', 'medical_orders.clinical_case_id')
                 ->join('medical_records', 'medical_records.id', '=', 'clinical_cases.medical_record_id')
                 ->where('medications.id', '=', $json['id'])
                 ->get();
        
        $aux = get_object_vars($idPerson[0]);

        $users = DB::table('important_anamnesis_observations')
                 ->select('important_item_groups.name','important_anamnesis_observations.description')
                 ->Join('important_item_groups', 'important_item_groups.id', '=', 'important_anamnesis_observations.important_item_group_id')
                 ->Join('medical_records', 'medical_records.id', '=', 'important_anamnesis_observations.medical_record_id')
                 ->Join('people', 'people.id', '=', 'medical_records.person_id')
                 ->where('person_id', '=', $aux['person_id'])
                 ->get();

		return array('medications'=> $json,'users'=> $users);

    }

    public function updateeditMedicamentoId(Request $request){
    	$json = $request->datos;
    	
        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "dose" => $json['dosis'],
            "frequency" => $json['frecuencia'],
            "presentation_Id" => $json['presentation_Id'],
            "start_time" => $json['fecha_inicio'],
            "end_time" => $json['fecha_fin'],
            "status" => 1
        );

        DB::table('medications')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
        
        $medications = DB::table('medical_orders')->select('medications.id','dose','frequency','start_time','end_time','people.last_name','components.name as compuesto','presentation_id')
                 ->join('medications', 'medications.medical_order_id', '=', 'medical_orders.id')
                 ->join('presentations', 'presentations.id', '=', 'medications.presentation_id')
                 ->join('components', 'components.id', '=', 'presentations.component_id')
                 ->join('presentation_types', 'presentation_types.id', '=', 'presentations.presentation_type_id')
                 ->join('doctors', 'doctors.id', '=', 'medical_orders.doctor_id')
                 ->join('people', 'people.id', '=', 'doctors.person_id')
                 ->where('status_discharge', '=', 0)
                 ->where('medications.status', '=', 1)
                 ->where('medications.id', '=', $json['id'])
                 ->where('doctor_id', '=', $json['doctor_id'])
                 ->groupBy('medications.id','dose','frequency','start_time','end_time','people.last_name','components.name','presentation_id')
                 ->get();

		return $medications;

    }

    public function updatedeletMedicamentoId(Request $request){
        $json = $request->datos;
        
        $datos = array(
            "status" => 0
        );

        return DB::table('medications')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
    }

    public function updatedeletCuidadoId(Request $request){
        $json = $request->datos;
        
        $datos = array(
            "status" => 0
        );

        return DB::table('health_cares')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
    }

    public function updatedeletExamenIId(Request $request){
        $json = $request->datos;
        
        $datos = array(
            "status" => 0
        );

        return DB::table('medical_tests')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
    }

    public function setCuidado(Request $request){
        $json = $request->datos;
        
      
        $datos = array(
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            'doctor_id'  => $json['doctor_id'],
            'clinical_case_id'  => $json['clinical_case_id']
        );
        $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                

        
        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "start_date" => date('Y-m-d H:i:s'),
            "description" => $json['descripcion'],
            "status" => 1,
            "medical_order_id" => $medical_order_id
        );

        $medication_id = DB::table('health_cares')->insertGetId($datos);

        $users = DB::table('people')->select('people.last_name as doc_name')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $medication_id,
            "descripcion"=> $json['descripcion'],
            "nombre_doctor"=> $aux['doc_name']
        );

        return $json;

    }

    public function geteditCuidadoId(Request $request){
        $json = $request->datos;
        
        $users = DB::table('health_cares')
                 ->where('id', '=', $json['id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        // $arrayFechaInicio = explode(" ",$aux['start_time']);
        // $fecha_inicio = trim($arrayFechaInicio[0]);

        // $arrayFechaFin = explode(" ",$aux['end_time']);
        // $fecha_fin = trim($arrayFechaInicio[0]);

        $json = array(
            "id"=> $aux['id'],
            "descripcion"=> $aux['description']
        );

        return $json;

    }

    public function updateeditCuidadoId(Request $request){

        $json = $request->datos;

        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "start_date" => date('Y-m-d H:i:s'),
            "description" => $json['descripcion'],
            "status" => 1
        );

        DB::table('health_cares')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
        $users = DB::table('people')->select('people.last_name as doc_name')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $json['id'],
            "descripcion"=> $json['descripcion'],
            "nombre_doctor"=> $aux['doc_name']
        );

        return $json;
    }


    public function setExamen(Request $request){
        $json = $request->datos;        
      
        $datos = array(
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'doctor_id' => $json['doctor_id'],
            'clinical_case_id'  => $json['clinical_case_id']
        );
        $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                

        
        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "test_type" => $json['tipo_examen'],
            "reason" => $json['descripcion'],
            "status" => 1,
            "medical_order_id" => $medical_order_id
        );

        $medication_id = DB::table('medical_tests')->insertGetId($datos);

        $users = DB::table('people')->select('people.last_name as doc_name')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $medication_id,
            "tipo_examen"=> $json['tipo_examen'],
            "descripcion"=> $json['descripcion'],
            "nombre_doctor"=> $aux['doc_name']
        );

        return $json;
    }

    public function geteditExamenId(Request $request){
        $json = $request->datos;
        
        $users = DB::table('medical_tests')
                 ->where('id', '=', $json['id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $aux['id'],
            "tipo_examen"=> $aux['test_type'],
            "descripcion"=> $aux['reason']
        );

        return $json;

    }

    public function updateeditExamenId(Request $request){

        $json = $request->datos;

        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "test_type" => $json['tipo_examen'],
            "reason" => $json['descripcion'],
            "status" => 1
        );

        DB::table('medical_tests')
                     ->where('id', '=', $json['id'])
                     ->update($datos);
        
        $users = DB::table('people')->select('people.last_name as doc_name')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $json['id'],
            "tipo_examen"=> $json['tipo_examen'],
            "descripcion"=> $json['descripcion'],
            "nombre_doctor"=> $aux['doc_name']
        );

        return $json;
    }


    public function setInterconsulta(Request $request){
        $json = $request->datos;        
      
        $datos = array(
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'doctor_id' => $json['doctor_id'],
            'clinical_case_id'  => $json['clinical_case_id']
        );
        $medical_order_id = DB::table('medical_orders')->insertGetId($datos);                

        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "description" => $json['motivo'],
            "reason" => $json['especialidad'],
            "status" => 1,
            "medical_order_id" => $medical_order_id
        );

        $medication_id = DB::table('referrals')->insertGetId($datos);

        $json = array(
            "id"=> $medication_id,
            "motivo"=> $json['motivo'],
            "especialidad"=> $json['especialidad'],
            "nombre_doctor"=> $json['doctor']
        );

        return $json;
    }

    public function geteditInterconsultaId(Request $request){
        $json = $request->datos;
        
        $users = DB::table('referrals')
                 ->where('id', '=', $json['id'])
                 ->get();

        $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $aux['id'],
            "motivo"=> $aux['description'],
            "especialidad"=> $aux['reason'],
            "nombre_doctor"=> 'Dr albani'
        );

        return $json;

    }

    public function updateeditInterconsultaId(Request $request){

        $json = $request->datos;

        $datos = array(
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "description" => $json['motivo'],
            "reason" => $json['especialidad'],
            "status" => 1
        );

        DB::table('referrals')
             ->where('id', '=', $json['id'])
             ->update($datos);
        
        // $users = DB::table('people')->select('people.last_name as doc_name')
        //          ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
        //          ->where('doctors.id', '=', $json['doctor_id'])
        //          ->get();

        // $aux = get_object_vars($users[0]);

        $json = array(
            "id"=> $json['id'],
            "motivo"=> $json['motivo'],
            "especialidad"=> $json['especialidad'],
            "nombre_doctor"=> $json['doctor']
        );

        return $json;
    }

    public function getDoctorInter(Request $request){
        return DB::table('people')->select('people.last_name as name','people.id')
                 ->leftJoin('doctors', 'people.id', '=', 'doctors.person_id')
                 // ->where('doctors.id', '=', $json['doctor_id'])
                 ->get();
    }

    public function GetOrdenesMedicas(Request $request){
        # code...
        $json = $request->datos;
        $array=array();

        $array['health_cares'] =  DB::table('medical_orders')->select('health_cares.id','description','people.last_name')
                 ->join('health_cares', 'health_cares.medical_order_id', '=', 'medical_orders.id')
                 ->join('doctors', 'doctors.id', '=', 'medical_orders.doctor_id')
                 ->join('people', 'people.id', '=', 'doctors.person_id')
                 ->where('status_discharge', '=', 0)
                 ->where('health_cares.status', '=', 1)
                 ->where('medical_orders.clinical_case_id', '=', $json['id'])
                 ->where('doctor_id', '=', $json['doctor_id'])
                 ->groupBy('health_cares.id','description','people.last_name')
                 ->get();

        $array['medical_tests'] = DB::table('medical_orders')->select('medical_tests.id','reason','test_type','people.last_name')
                 ->join('medical_tests', 'medical_tests.medical_order_id', '=', 'medical_orders.id')
                 ->join('doctors', 'doctors.id', '=', 'medical_orders.doctor_id')
                 ->join('people', 'people.id', '=', 'doctors.person_id')
                 ->where('status_discharge', '=', 0)
                 ->where('medical_tests.status', '=', 1)
                 ->where('medical_orders.clinical_case_id', '=', $json['id'])
                 ->where('doctor_id', '=', $json['doctor_id'])
                 ->groupBy('medical_tests.id','reason','test_type','people.last_name')
                 ->get();

        $array['medications']= DB::table('medical_orders')->select('medications.id','dose','frequency','start_time','end_time','people.last_name','components.name','presentation_id')
                 ->join('medications', 'medications.medical_order_id', '=', 'medical_orders.id')
                 ->join('presentations', 'presentations.id', '=', 'medications.presentation_id')
                 ->join('components', 'components.id', '=', 'presentations.component_id')
                 ->join('presentation_types', 'presentation_types.id', '=', 'presentations.presentation_type_id')
                 ->join('doctors', 'doctors.id', '=', 'medical_orders.doctor_id')
                 ->join('people', 'people.id', '=', 'doctors.person_id')
                 ->where('status_discharge', '=', 0)
                 ->where('medications.status', '=', 1)
                 ->where('medical_orders.clinical_case_id', '=', $json['id'])
                 ->where('doctor_id', '=', $json['doctor_id'])
                 ->groupBy('medications.id','dose','frequency','start_time','end_time','people.last_name','components.name','presentation_id')
                 ->get();

        return $array;

    }
}
