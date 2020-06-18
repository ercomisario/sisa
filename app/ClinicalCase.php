<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicalCase extends Model
{
    
    //relaciones
    public function medicalRecord(){
        return $this->belongsTo('App\MedicalRecord');
    }

    public function medicalReport(){
        return $this->belongsTo('App\MedicalReport');
    }

    public function medicalEvolutions(){
        return $this->hasMany('App\MedicalEvolution');
    }
    public function medicalOrders(){
        return $this->hasMany('App\MedicalOrder');
    }

    public function nurseReports(){
        return $this->hasMany('App\NurseReport');
    }

    public function vitalSigns(){
        return $this->hasMany('App\VitalSign');
    }

    public function medicalJustification(){
        return $this->hasOne('App\MedicalJustification');
    }

    public function anamnesisRecord(){
        return $this->hasOne('App\AnamnesisRecord');
    }
    public function anamnesisAll(){
         
        if ($this->anamnesisRecord()->first()) {
            $resultado = [];
            $i=0;
            foreach($this->anamnesisRecord()->first()->anamnesisObservations()->get() as $anamnesisOservation){
                $resultado[$i]['observation'] = $anamnesisOservation->description;
                $resultado[$i]['item']=$anamnesisOservation->itemGroup()->first()->name;
                $resultado[$i]['analysisGroup']=$anamnesisOservation->itemGroup()->first()->analysisGroup()->first()->name;
                $resultado[$i]['analysisType']=$anamnesisOservation->itemGroup()->first()->analysisGroup()->first()->analysisType()->first()->name;
                $i++;
            }
            $this->anamnesis = json_decode(json_encode($resultado), FALSE);
        } else {
            $this->anamnesis = '';
        }      
        

    }
    public function referrals(){
        return $this->hasManyThrough('App\Referral','App\MedicalOrder');
    }

    public function medicalTests(){
        return $this->hasManyThrough('App\MedicalTest','App\MedicalOrder');
    }

    public function healthCares(){
        return $this->hasManyThrough('App\HealthCare','App\MedicalOrder');
    }

    public function medicalDischarges(){
        return $this->hasManyThrough('App\MedicalDischarge','App\MedicalOrder');
    }

    public function medications(){
        return $this->hasManyThrough('App\Medication','App\MedicalOrder');
    }
    //esta funcion agrega pathology, medicalCenter, doctor a un caso clinico
    public function cardInfo(){
        $this->pathology = $this->medicalReport()->first()->pathology;
        $this->medicalCenter = $this->medicalReport()->first()->medicalConsultation()->first()->secretary()->first()->medicalCenter()->first()->name;
        $this->doctor = $this->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->person()->first()->name;
        $this->doctor_last_name = $this->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->person()->first()->last_name;
        $this->specialty = $this->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->speciality;
        $this->license = $this->medicalReport()->first()->medicalConsultation()->first()->doctor()->first()->license;
        $this->diagnostic = $this->medicalReport()->first()->diagnostic;
        
        //aqui miguel
        $this->medical_consultation =  $this->medicalReport()->first()->medicalConsultation()->first();
        $this->medical_justification =  $this->medicalJustification()->first();
    }
    public function anamnesisAll2(){
         
        if ($this->anamnesisRecord()->first()) {
            
            $resultado = [];
            $anamnesisOservations = $this->anamnesisRecord()->first()->anamnesisObservations()->get();
            $i=0;
            $analysisType = $anamnesisOservations[0]->itemGroup()->first()->analysisGroup()->first()->analysisType()->first()->name;
            $analysisGroup = $anamnesisOservations[0]->itemGroup()->first()->analysisGroup()->first()->name;
            foreach($anamnesisOservations as $anamnesisOservation){
                $analysisType2=$anamnesisOservation->itemGroup()->first()->analysisGroup()->first()->analysisType()->first()->name;
                $analysisGroup2=$anamnesisOservation->itemGroup()->first()->analysisGroup()->first()->name;
                if($analysisType2 != $analysisType){
                    $analysisType = $analysisType2;
                }
                if($analysisGroup2 != $analysisGroup){
                    $analysisGroup = $analysisGroup2;
                    if(array_key_exists($analysisType,$resultado)){
                        if (array_key_exists($analysisGroup, $resultado[$analysisType])) {
                            $i = count($resultado[$analysisType][$analysisGroup]); 
                        }                        
                    }
                    else{
                        $i = 0;
                    }
                }
                $resultado[$analysisType][$analysisGroup][$i]['observation'] = $anamnesisOservation->description;
                $resultado[$analysisType][$analysisGroup][$i]['item']=$anamnesisOservation->itemGroup()->first()->name;
                $i++;
            }
            $this->anamnesis = json_decode(json_encode($resultado), FALSE);
        } else {
            $this->anamnesis = false;
        }      
        

    }
}
