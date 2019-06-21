<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Employee;
use DB;

class Patient extends Employee
{

    //Form::select('A', Config::get('enums.blood'));

    public function ShowMyReport(){

    }

    public function ReserveAppointment(){

    }

    public function ShowMyHistoryReservation(){

    }

    public function ShowClinicTimeTable(){
    	
    }

    public function getMyHistory($patient_id){

                      $patient = new Patient();

         

         $patient =  DB::table('users')
                      ->select('users.*') 
                      ->where('users.id','=',$patient_id)
                      ->get();


             $reservation_analysis  = array();
             $reservation_diseases  = array();
             $reservation_medicines  = array();
             $reservation_parades  = array();
             
          $String = "";


               $reservations =  DB::table('reservations')
               ->select('reservations.*','users.name as doctor_name','specializations.name as sp_name') 
                                     ->join('users', 'reservations.doctor_id','=','users.id') 
                                     ->join('doctors', 'reservations.doctor_id','=','doctors.doctor_id') 
                       ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
                                    ->where('reservations.patient_id','=',$patient_id)
                                    ->where('reservations.is_active','=','0')
                                    ->get();
       

        $String .= "Patient Data  "."<br/>";
    $String .= "---------------"."<br/>";
    $String .= " Name : ".$patient[0]->name."<br/>";
    $String .= " E-Mail : ".$patient[0]->email."<br/>";
    $String .= " Phone : ".$patient[0]->phone."<br/>";
    $String .= " Nationality ID : ".$patient[0]->nationality_id."<br/>";
    $String .= "-----------------------------------------------------------------------------------------"."<br/>";
    $String .= "-----------------------------------------------------------------------------------------"."<br/>";
    $String .= "-----------------------------------Rreservations-------------------------------------"."<br/>";
    $String .= "-----------------------------------------------------------------------------------------"."<br/>";
    $String .= "-----------------------------------------------------------------------------------------"."<br/>";
           if($reservations){
             
   
    for ($i=0; $i < sizeof($reservations); $i++) {
      
    $res_id = $reservations[$i]->id;
     
           //$String .= "# : ".++$i."<br/>";--$i;
           $String .= "Doctor Name : ".$reservations[$i]->doctor_name."<br/>";
           $String .= "Department : ".$reservations[$i]->sp_name."<br/>";
           $String .= "Date : ".$reservations[$i]->date."<br/>";
           $String .= "=================="."<br/>";
           
             
           $reservation_parades  =  DB::table('reservation_parades')
                                    ->select('reservation_parades.*')  
                                    ->where('reservation_parades.reservation_id','=',$res_id)
                                    ->get();

           $reservation_medicines =  DB::table('reservation_medicines')
                                    ->select('reservation_medicines.*')  
                                    ->where('reservation_medicines.reservation_id','=',$res_id)
                                    ->get();

           $reservation_diseases =  DB::table('reservation_diseases')
                                    ->select('reservation_diseases.*')  
                                    ->where('reservation_diseases.reservation_id','=',$res_id)
                                    ->get();

           $reservation_analysis =  DB::table('reservation_analysis')
                                    ->select('reservation_analysis.*')  
                                    ->where('reservation_analysis.reservation_id','=',$res_id)
                                    ->get();


$reservation_parades_array = array();

$reservation_medicines_array = array();

$reservation_diseases_array = array();

$reservation_analysis_array = array();


for ($m=0; $m < sizeof($reservation_parades) ; $m++) { 
$reservation_parades_array[$m] = $reservation_parades[$m]->parades_id;
}

for ($m=0; $m < sizeof($reservation_medicines) ; $m++) { 
$reservation_medicines_array[$m] = $reservation_medicines[$m]->medicine_id;
}

for ($m=0; $m < sizeof($reservation_diseases) ; $m++) { 
$reservation_diseases_array[$m] = $reservation_diseases[$m]->disease_id;
}

for ($m=0; $m < sizeof($reservation_analysis) ; $m++) { 
$reservation_analysis_array[$m] = $reservation_analysis[$m]->analysis_id;
}
 
       $reservation_parades = array_unique($reservation_parades_array);
       $reservation_medicines = array_unique($reservation_medicines_array);
       $reservation_diseases = array_unique($reservation_diseases_array);
       $reservation_analysis = array_unique($reservation_analysis_array);

 
 
      $String .= "parades : ** ";
      if($reservation_parades){
    for ($j=0; $j < sizeof($reservation_parades) + 1 ; $j++) {
     if(isset($reservation_parades[$j])){
           $parades = DB::table('parades')
                        ->distinct()
                        ->select('parades.*')
                        ->where('parades.id','=',$reservation_parades[$j])
                        ->groupBy('parades.id')
                        ->get();
      if(isset($parades[0]->name))
    $String .= $parades[0]->name.",";
      }
    }
    $String .= "<br/>";
    }else{$String .="No Parades To Show"."<br/>";}
     $String .= "medicines : ** ";
     if($reservation_medicines){
    for ($j=0; $j < sizeof($reservation_medicines) + 1 ; $j++) {
      if(isset($reservation_medicines[$j])){
           $medicines = DB::table('medicines')
                        ->select('medicines.*')
 
                        ->where('medicines.id','=',$reservation_medicines[$j])
                        ->get();
     if(isset($medicines[0]->name))
    $String .= $medicines[0]->name.",";
     }
    }
    $String .= "<br/>";
    }else{$String .="No medicines To Show"."<br/>";}
    $String .= "diseases : ** ";
     if($reservation_diseases){
    for ($j=0; $j < sizeof($reservation_diseases) + 1 ; $j++) {
      if(isset($reservation_diseases[$j])){
           $diseases = DB::table('diseases')
                        ->select('diseases.*')
    
                        ->where('diseases.id','=',$reservation_diseases[$j])
                        ->get();
      if(isset($diseases[0]->name))
    $String .= $diseases[0]->name.",";
     }
    }
    $String .= "<br/>";
    }else{$String .="No diseases To Show"."<br/>";}
      $String .= "analysis : ** ";
     if($reservation_analysis){
    for ($j=0; $j < sizeof($reservation_analysis) + 1 ; $j++) {
      if(isset($reservation_analysis[$j])){
           $analysis = DB::table('analysis')
                        ->select('analysis.*')
            
                        ->where('analysis.id','=',$reservation_analysis[$j])
                        ->get();
       if(isset($analysis[0]->name))
    $String .= $analysis[0]->name.",";
     }
    }
    $String .= "<br/>";
    }else{$String .="No analysis To Show"."<br/>";}

     
    if($i == (sizeof($reservations) - 1)){
    $String .= "<br/>"."-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"."<br/>";
    }
        else{
    $String .= "<br/>------------------------------------------------------<br/>";
    }

    }

 
    }else{ $String .= "Patient Have No Reservations."."<br/>";}

    return $String;


          
    }



}
