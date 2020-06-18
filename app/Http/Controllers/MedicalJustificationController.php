<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedicalJustification;
use PDF;


class MedicalJustificationController extends Controller
{
    //
    public function medicalJustification(Request $request)
    {
    	# code...

    	$justificativo = MedicalJustification::find($request->id);

      if($justificativo){
      	$justificativo->doctor=$justificativo->clinicalCase()->first()->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->person()->first();
      	$justificativo->person = $justificativo->clinicalCase()->first()->medicalRecord()->first()->person()->first();
    	   return view('person.medical-justification', compact(['justificativo']));

      }else{
         $message='No se encontro registro';
         return view('person.search-medical-justification', compact(['message']));        
      }

    	// return $justificativo;

    }

    public function printMedicalJustification(Request $request)
    {
        # code...

        $justificativo = MedicalJustification::find($request->id);
        $justificativo->doctor=$justificativo->clinicalCase()->first()->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->person()->first();
        $justificativo->person = $justificativo->clinicalCase()->first()->medicalRecord()->first()->person()->first();

      
        $plantillaPDF = $this->plantillaPDF($justificativo);
        // $pdf = PDF::loadHTML($plantillaPDF)->save('../public/pdf/justificativo.pdf');

        $pdf = PDF::loadHTML($plantillaPDF);              
        return $pdf->download('justificativo.pdf');

        // return $justificativo;

    }

     public function plantillaPDF($data){
        
        return '
          <img class="" style="" src="'.$data['qr_path'].'" width="150" height="150">
          <h3>Nombre: '.$data['person']['last_name'].', '.$data['person']['name'].'</h3>
          <h3>Cedula: '.$data['person']['cedula'].'</h3>
          <br>
          
          <h4>Dr. '.$data['doctor']['last_name'].', '.$data['doctor']['name'].'</h4>
          <h4>Fecha '.$data['start_date'].' - '.$data['end_date'].'</h4>
          
          <p style="text-align: justify;">
            Descripción: '.$data['description'].'
          </p>

        ';
    }

}
