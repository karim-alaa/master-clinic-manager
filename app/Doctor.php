<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EditDoctorProfile;
use App\Employee;
use App\DoctorCv;
use App\Diagnosis;
use App\observer;
use DB;
use Auth;

class Doctor extends Employee implements Observer

{
   // public $salary;
    //public $avatar;
    private $specialization;
    private $sp_id;

        public function Setspecialization($specialization)
    {
      
      $this->specialization = $specialization;

    }

    public function Getspecialization()
    {

        return $this->specialization;
    }



        public function Setsp_id($sp_id)
    {
      
      $this->sp_id = $sp_id;

    }

    public function Getsp_id()
    {

        return $this->sp_id;
    }

  //  Form::select('1', Config::get('enums.specilization'));

/*
      function __construct() {
        $user = new Doctor();
        $doctor = $user->getDoctorById(Auth::id());
         
          foreach($doctor as $doctrs){
              $user->email = $doctrs->useremail;
              $user->username = $doctrs->username;
              $user->nationality_id = $doctrs->nation;
          }
          
          return  $user;
           
      }
*/

      public function removeNewNotfiy($doctor_id, $about){
         DB::table('notifications')
               ->where('observer_id', $doctor_id)
               ->update(['new'=>'0',
                    ]);
               return true;
      }

    public function UpdateDoctorProfile($opj){
      $name = $opj->Getusername();
      $email = $opj->Getemail();
      $address = $opj->Getaddress();
      $age = $opj->Getage();
      $phone = $opj->Getphone();
      $sp_id = $opj->Getsp_id();
      $nationality_id = $opj->Getnationality_id();
      DB::table('users')
            ->where('id', $opj->Getid())
            ->update(['name' => $name, 
                      'nationality_id' => $nationality_id , 
                      'address' => $address,
                      'age' => $age,
                      'phone' => $phone,
                      'email' => $email,
                    ]);

      DB::table('doctors')
            ->where('doctor_id', $opj->Getid())
            ->update([
                      'specialization_id' => $sp_id,
                    ]);
            return true;
     // $specialization = $opj->specialization;
    }

    public function UploadCvAttachment(){
         
    }

    public function UploadDoctorImage(){
               
    }

    public function DignosisPatient(){

    }

    public function ShowPatientDiagnosis(){
    	
    }

    public function getDoctorById($id){
            $doctor = DB::table('doctors')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->join('users', 'doctors.doctor_id', '=', 'users.id')
            ->select('doctors.*','specializations.name as spname', 'users.email as useremail','users.name as username', 'users.nationality_id as nation',
              'users.phone', 'users.age', 'users.address')->where('doctors.doctor_id','=',$id)
            ->get();
            return $doctor;
            if($doctor)
                return $doctor;
            else
                return false;
    }

    public function searchDoctor($email){
        $results = DB::table('users')->where('email','=',$email)
        ->get();
        return $results;
    }

    public function saveCV($cv,$id){
       $destinationPath = 'doctors/cv'; // upload path
       $extension =  $cv->getClientOriginalExtension(); // getting file extension
       $fileName = 'doctors/cv/'.rand (1000000,9000000).'-'.date("Y-m-d") .'-'.Auth::user()->name.'-'.'CV'.'.'.$extension; // renameing file
       $cv->move($destinationPath, $fileName); // uploading file to given path

       DB::table('doctors')
            ->where('doctor_id', $id)
            ->update(['doctorCv' => $fileName]);
      return true;
      
    }


    public function getOldCV($id){
        $oldcv = DB::table('doctors')
            ->select('doctors.doctorCv as cv')->where('doctors.doctor_id','=',$id)
            ->get();
            if($oldcv)
                return $oldcv;
            else
                return false;
    }

    public function downloadMyCV($id){
      $cv = DB::table('doctors')
            ->select('doctors.doctorCv as cv')->where('doctors.doctor_id','=',$id)
            ->get();
           
           if($cv){
            $filePath = $cv[0]->cv;

if (file_exists($filePath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
    header('Expires: 0');
   // header("Content-Transfer-Encoding: Binary");
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
    exit;
    }

           }else{
            return false;
           }
    }
  

    public function listAllOffers($id){
      $offers = DB::table('offer')
            ->join('clinics', 'offer.clinic_id', '=', 'clinics.id')
            ->join('users', 'offer.owner_id', '=', 'users.id')
            ->where('offer.is_active','=','1')->where('offer.doctor_id','=',$id)->where('offer.is_accepted','=','0')
            ->select('offer.*','offer.id as offer_id','clinics.name as clinicName','clinics.phone as clinicPhone','users.name as ownerName','users.email as ownerEmail')
            ->paginate(15);
            return $offers;
    }

    public function getOfferById($id){
      $offer = DB::table('offer')
            ->join('clinics', 'offer.clinic_id', '=', 'clinics.id')
            ->join('users', 'offer.owner_id', '=', 'users.id')
            ->where('offer.is_active','=','1')->where('offer.id','=',$id)->where('offer.is_accepted','=','0')
            ->select('offer.*','offer.id as offer_id','clinics.name as clinicName','clinics.phone as clinicPhone','users.name as ownerName','users.email as ownerEmail')
            ->paginate(15);
            return $offer;
    }

    public function  rejectOffer($id){
          DB::table('offer')
            ->where('id', $id)
            ->update([ 
                      'is_active' => '0',
                    //'is_accepted' => '0',
                    ]);
            // notfiy owner
            return true;
    }

    public function setWorkTime($time,$offer,$doctor_id){
          $can_accept = true;
          $res = DB::table('workTime')
            ->select('clinic_id','doctor_id', 'day_id','from','to','date','is_active')
                        ->where('doctor_id','=',$doctor_id)
                        ->get();
                        if($res){
                            for ($i=1; $i <= 7 ; $i++) { 
                              if($time->checks[$i] == true){
                        
                                foreach ($res as $result) {
                                  if(
                                       
                                      $result->day_id == $i
                                      &&$result->from == $time->from[$i]
                                      &&$result->to == $time->to[$i]
                                      &&$result->is_active == 1
                                    ){
                                    $can_accept = false;
                                  }

                                }

                                }

                            }

                        }
     

          if($can_accept)
          {
                    for ($i=1; $i <= 7 ; $i++) { 
                          if($time->checks[$i] == true){
                                   DB::table('workTime')->insert([
                                        ['clinic_id' => $offer->offer_id,
                                         'doctor_id'=> $doctor_id,
                                         'day_id' =>  $i,
                                         'from' => $time->from[$i],
                                         'to'=> $time->to[$i],
                                         'date'=> date("d/m/Y"),
                                         'is_active' => '1'
                                        ]
                                   ]);
                          }

                    }
                  }else{
                    return false;
                  }
                     $this->employeeDoctor($offer,$doctor_id);
                     $this->acceptOffer($offer);
                     return true;
    }

    public function acceptOffer($offer){
           DB::table('offer')
            ->where('id', $offer->id)
            ->update([ 
                    //'is_active' => '0',
                      'is_accepted' => '1',
            ]);
            return true;
    }

    public function employeeDoctor($offer,$doctor_id){
 
      $date = date('Y-m-d H:i:s');
            DB::table('clinic_employees')->insert([
                ['clinic_id' => $offer->clinic_id,
                 'employee_id'=> $doctor_id,
                 'created_at'=> date("d/m/Y"),
                 'employment_date'=> $date,
                 'is_active' => '1'
                ]
            ]);
            return true;
    }

    public static function getdoctorData($id,$date)
    {
        $clinic_id = DB::table('clinic_employees')
         ->select('clinic_employees.clinic_id')
         ->where('clinic_employees.employee_id','=',$id)->get();
        if($clinic_id){
          $clinic_id2=$clinic_id[0]->clinic_id;
        
          $resultsss = DB::table('clinic_employees')
           ->join('users', 'clinic_employees.employee_id', '=', 'users.id')
           ->join('worktime','worktime.doctor_id','=', 'users.id')
           ->select( 'users.name', 'clinic_employees.employee_id')
           ->where('clinic_employees.clinic_id' ,'=',$clinic_id2)
           ->where('users.role_id','=','2')
           ->where('worktime.day_id','=',$date)
           ->distinct('users.id')
           ->get();
          
        if($resultsss)
          return $resultsss;
        return "error";
        }
        else {return [];}
    }


    public static function getTimetable($nurseId){
          $clinic_id = DB::table('clinic_employees')
         ->select('clinic_employees.clinic_id')
         ->where('clinic_employees.employee_id','=',$nurseId)->get();

        if($clinic_id){
          $clinic_id2=$clinic_id[0]->clinic_id;
        
          $resultsss = DB::table('clinic_employees')
           ->join('users', 'clinic_employees.employee_id', '=', 'users.id')
           ->join('worktime','worktime.doctor_id','=', 'users.id')
           ->join('days','worktime.day_id','=','days.id')
           ->select( 'users.name', 'clinic_employees.employee_id','days.day','worktime.from','worktime.to')
           ->where('clinic_employees.clinic_id' ,'=',$clinic_id2)
          // ->where('worktime.clinic_id' ,'=',$clinic_id2)
           ->where('users.role_id','=','2')
           ->distinct('users.name')
           ->get();
          // var_dump($resultsss);
        if($resultsss)
          return $resultsss;
        return "error";
        }
        else {return false;}
    
    }


        public function getReservationData($id){      
          $reservations = DB::table('reservations')
                        ->join('users', 'users.id' ,'=', 'reservations.patient_id')
                        ->select('users.name as patientName','reservations.*', 'reservations.is_examination as examination')
                        ->where('reservations.id','=',$id)
                        ->get();
        
       if($reservations){
        return $reservations;
       }
       else return false;
    }



     public function doctorReservations($clinic_id,$doctor_id){
     
           
            $today = date('Y-m-d');
              $reservations = DB::table('reservations')
                  ->join('users', 'users.id' ,'=', 'reservations.patient_id')
                  ->select('users.name as patientName','reservations.*', 'reservations.is_examination as examination')
                  ->where('reservations.doctor_id','=',$doctor_id)
                  ->where('reservations.is_active','=','1')      
                  ->where('reservations.clinic_id', '=', $clinic_id)
                  ->where('reservations.date', '=', $today)
                  ->paginate(15);
      
       if($reservations){
        return $reservations;
       }
       else return false;
    }

    public function getMyClinics($doctor_id){
       $myClinics = DB::table('clinic_employees')
                        ->select('clinic_employees.clinic_id as id','clinics.name as name')
                        ->join('clinics','clinics.id','=','clinic_employees.clinic_id')
                        ->where('clinic_employees.employee_id','=',$doctor_id)
                        ->distinct('clinic_employees.clinic_id')
                        ->get();
       if($myClinics)
        return $myClinics;
      else
        return false;
    }

    public function getParades($clinic_id,$doctor_id){
        
           $parades = DB::table('parades')
                        ->select('parades.*')
                        ->where('parades.clinic_id', '=', $clinic_id)
                        ->orWhere('parades.clinic_id', '=', '0')
                        ->get();
        
       if($parades)
        return $parades;
      else
        return false;
    }
    public function getMedicines($clinic_id,$doctor_id){
        
           $medicines = DB::table('medicines')
                        ->select('medicines.*')
                        ->where('medicines.clinic_id', '=', $clinic_id)
                        ->orWhere('medicines.clinic_id', '=', '0')
                        ->get();
       
       if($medicines)
        return $medicines;
      else
        return false;
    }
    public function getDiseases($clinic_id,$doctor_id){
         
           $diseases = DB::table('diseases')
                        ->select('diseases.*')
                        ->where('diseases.clinic_id', '=', $clinic_id)
                        ->orWhere('diseases.clinic_id', '=', '0')
                        ->get();
       
       if($diseases)
        return $diseases;
      else
        return false;
    }
    public function getAnalysis($clinic_id,$doctor_id){
      
           $analysis = DB::table('analysis')
                        ->select('analysis.*')
                        ->where('analysis.clinic_id', '=', $clinic_id)
                        ->orWhere('analysis.clinic_id', '=', '0')
                        ->get();
        
       if($analysis)
        return $analysis;
      else
        return false;
    }



     public function getClinicParades($clinic_id,$doctor_id){
           $parades = DB::table('parades')
                        ->select('parades.*')
                        ->where('parades.clinic_id', '=', $clinic_id)
                        ->get();
        return $parades;
    }

    public function getClinicMedicines($clinic_id,$doctor_id){
           $medicines = DB::table('medicines')
                        ->select('medicines.*')
                        ->where('medicines.clinic_id', '=', $clinic_id)
                        ->get();
        return $medicines;
     
    }

    public function getClinicDiseases($clinic_id,$doctor_id){
           $diseases = DB::table('diseases')
                        ->select('diseases.*')
                        ->where('diseases.clinic_id', '=', $clinic_id)
                        ->get();
        return $diseases;
      
    }

    public function getClinicAnalysis($clinic_id,$doctor_id){
           $analysis = DB::table('analysis')
                        ->select('analysis.*')
                        ->where('analysis.clinic_id', '=', $clinic_id)
                        ->get();
        return $analysis;
    }





    public function writeDiagnosis($parades,$diseases,$medicines,$analysis,$reservation_id){
     
           foreach ($parades as $parade) {
             DB::table('reservation_parades')->insert(
                ['reservation_id' => $reservation_id,'parades_id' => $parade]
             );
           }
       
       
           foreach ($diseases as $disease) {
             DB::table('reservation_diseases')->insert(
                ['reservation_id' => $reservation_id,'disease_id' =>  $disease]
             );
           }
         
        
           foreach ($medicines as $medicine) {
             DB::table('reservation_medicines')->insert(
                ['reservation_id' => $reservation_id,'medicine_id' =>  $medicine]
             );
           }
         
         if(!empty($analysis)){
           foreach ($analysis as $analys) {
             DB::table('reservation_analysis')->insert(
                ['reservation_id' => $reservation_id,'analysis_id' =>  $analys]
             );
           }
         }

         DB::table('reservations')
            ->where('id', $reservation_id)
            ->update(['is_active' => 0]);
        return true;
    }


 


      public function editClinicPDMA($parades,$diseases,$medicines,$analysis,$clinic_id){
         
          // clear old data
          DB::table('parades')->where('clinic_id', '=', $clinic_id)->delete();
          DB::table('diseases')->where('clinic_id', '=', $clinic_id)->delete();
          DB::table('medicines')->where('clinic_id', '=', $clinic_id)->delete();
          DB::table('analysis')->where('clinic_id', '=', $clinic_id)->delete();

            try{
          if(!empty($parades)){
             foreach ($parades as $parade) {
                 if($parade != ""){
                     $oldPrades =  DB::table('parades')->select('parades.name')->where('parades.name','=',$parade)->get();
                     if($oldPrades){}
                      else{
                     DB::table('parades')->insert(
                        ['clinic_id' => $clinic_id,'name' => $parade]
                     );
                   }
                 }
             }
          }
          if(!empty($diseases)){
             foreach ($diseases as $disease) {
                 if($disease != ""){
                   $oldDisease =  DB::table('diseases')->select('diseases.name')->where('diseases.name','=',$disease)->get();
                     if($oldDisease){}
                      else{
                     DB::table('diseases')->insert(
                        ['clinic_id' => $clinic_id,'name' =>  $disease]
                     ); 
                   }
                 }
             }
           }
           if(!empty($medicines)){
             foreach ($medicines as $medicine) {
                 if($medicine != ""){
                   $oldMedicine =  DB::table('medicines')->select('medicines.name')->where('medicines.name','=',$medicine)->get();
                     if($oldMedicine){}
                      else{
                     DB::table('medicines')->insert(
                        ['clinic_id' => $clinic_id,'name' =>  $medicine]
                     );
                   }
                 }
             }
           }
           if(!empty($analysis)){
             foreach ($analysis as $analys) {
                if($analys != ""){
                   $oldAnalysis =  DB::table('analysis')->select('analysis.name')->where('analysis.name','=',$analys)->get();
                     if($oldAnalysis){}
                      else{
                   DB::table('analysis')->insert(
                      ['clinic_id' => $clinic_id,'name' =>  $analys]
                   );
                 }
                }
             }
           }
           return true;
         }catch(Exception $ex){
             return true;
         }
          
       return true;
    }

    public function classupdate($notifier_id,$title,$message){
    $link = "http://localhost:8000/user/removeMessagesAlert";
     DB::table('notifications')->insert([
              ['new' => '1', 
               'notifier_id' => $notifier_id, 
                'note' => $message,
                'about' => $title,
               'observer_id' => $this->Getid(),
               'link' => $link
               ]
         ]);

   }


}
