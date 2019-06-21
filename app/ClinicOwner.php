<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clinic;
use DB;
use App\EditClinicOwnerProfile;
use App\Employee;
use App\Notify;
use App\Subject;
use Auth;


class ClinicOwner extends Employee implements Subject
{
    private $aboutOwner;

    private $observers = array();

       public function SetaboutOwner($aboutOwner)
    {
      
      $this->aboutOwner = $aboutOwner;

    }

    public function GetaboutOwner()
    {

        return $this->aboutOwner;
    }

    public function addClinic($c){
                $name = $c->Getname();
                $address = $c->Getaddress();
                $phone = $c->Getphone();
                $description = $c->Getdescription();
                $results = DB::table('clinics')->where('name','=',$name)->get();
                if($results)
                  return false;
                 DB::table('clinics')->insert([
                      ['name' => $name, 'address'=> $address,
                       'phone' =>  $phone, 'description' => $description,
                       'is_active'=>'1','owner_id'=> Auth::id()]
                 ]);
                 return true;
    }



 

    public function deleteClinic($id){
               return DB::table('clinics')
                   ->where('id', $id)
                   ->update(['is_active' => '0']);
                   return true;
    }

 

    public function updateClinic($c,$id){
                $name = $c->Getname();
                $address = $c->Getaddress();
                $phone = $c->Getphone();
                $description = $c->Getdescription();
                $results = DB::table('clinics')->where('name','=',$name)->where('id','<>',$id)->get();
                var_dump($results);
                if($results)
                  return false;
               DB::table('clinics')
                   ->where('id', $id)
                   ->update(['address_id' => '1', 'name' => $name,
                             'address'=> $address,
                             'phone' =>  $phone, 'description' => $description,
                           ]);
                return true;
    }

 



    public function showClinics(){
       $clinics = DB::table('clinics')
       ->where('owner_id','=',Auth::id())
       ->where('is_active','=','1')
       ->get(); // where is_active = 0
        return $clinics;
    }

       public function searchDoctor($email){
      $d =new Doctor();
      return $d->searchDoctor($email);
    }


    public function sack($eid){
      echo $eid;
      DB::table('clinic_employees')
          ->where('employee_id', $eid)
          ->update(['is_active' => '0','sack_date' => date('y-m-d')]);

      $results = DB::table('users')->where('id','=',$eid)->get();
      if($results[0]->role_id == 1){
        DB::table('users')
            ->where('id', $eid)
            ->update(['is_active' => '0']);
            return true;
      }
      //return true;
     
    }



    public function Show($role){
          switch ($role) {
            case "clinic":
                
              
                break;
		    case "doctor":
		        $doctors = DB::table('doctors')
            ->join('employees', 'doctors.doctor_id', '=', 'employees.id')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select('doctors.*', 'employees.*', 'users.*', 'roles.*','specializations.*')
            ->get(); // where is_active = 0
                return $doctors;
		        break;
		    case "nurse":

		        break;
          } 
    }






       public function getOwnerById($id){
            $owner = DB::table('users')
           
           
            ->select('users.*')->where('users.id','=',$id)
            ->get();
            if($owner)
                return $owner;
            else
                return false;
    }



     public function UpdateOwnerProfile($opj){
      $name = $opj->Getusername();
      $email = $opj->Getemail();
       $address = $opj->Getaddress();
      $age = $opj->Getage();
      $phone = $opj->Getphone();
      $nationality_id = $opj->Getnationality_id();
      DB::table('users')
            ->where('id', $opj->Getid())
            ->update(['name' => $name, 'nationality_id' => $nationality_id ,
               'address' => $address,
                      'age' => $age,
                      'phone' => $phone,
             'email' => $email]);
            return true;
    }

    
    public static function newOwner($al){
      $instance = new self();
      $instance->alert = $al;
      return $instance;
    }


      public function showAllDoctors(){
           $doctor = DB::table('doctors')
           ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->join('users', 'doctors.doctor_id', '=', 'users.id')
           
            ->select('doctors.*','specializations.name as spname', 'users.email as useremail','users.name as username', 'users.nationality_id as nation',
              'users.phone', 'users.age', 'users.address'
              )->where('doctors.is_active','=','1')
             ->paginate(15);
            return $doctor;
    }



    public function getClinicsByDoctorID($id){
                 $clinics = DB::table('clinics')     
            ->select('clinics.*')->where('clinics.is_active','=','1')->where('clinics.owner_id','=',$id)
             ->paginate(15);
            return $clinics;
    }

 
    public function sendOffer($opj){
      $res = $opj->GetalretMethod();
      if($res == 1){
       // echo $opj->alretMethod;
        $not = new Notify();
        return $not->Send($opj);
      }
        $em= Email::getInstance();
         return $em->Send($opj);
      
    }



    public function getMyClinics($owner_id){
       $myClinics = DB::table('clinics')
                        ->select('clinics.*','clinics.name as clinic_name')
                        ->where('clinics.owner_id','=',$owner_id)
                        ->where('clinics.is_active','=','1')
                        ->distinct('clinics.id')
                        ->get();
       if($myClinics)
        return $myClinics;
      else
        return false;
    }

       public function getMyHistory($clinic_id){
          $history =  DB::table('reservations')
                         ->select('reservations.*', 'users.name as patient_name','specializations.name as sp_name', 'users.name as doctor_name')
                         ->join('users', 'reservations.patient_id', '=', 'users.id')
                         ->join('doctors', 'reservations.doctor_id', '=', 'doctors.doctor_id')
                        // ->join('users', 'doctors.id', '=', 'users.id')
                         ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
                         ->where('reservations.clinic_id','=',$clinic_id)
                         ->paginate(15);
      if($history)
        return $history;
      else
        return false;
      
   }


   public function get_doc_num($id)
    {
      $result = DB::table('clinic_employees')
      ->join('doctors','clinic_employees.employee_id','=','doctors.doctor_id')
      ->where('clinic_employees.clinic_id','=',$id)
       ->where('doctors.is_active','=','1')
       ->where('clinic_employees.is_active','=','1')
       ->count('doctors.doctor_id');
      if($result)
        return $result;
      else
        return false;
    }

    public function get_today_reservations($id)
    {
      $reserve = DB::table('reservations')->where('reservations.clinic_id','=',$id)->where('reservations.date','=',date('y-m-d'))->count('reservations.clinic_id');
        if ($reserve)
          return $reserve;
        else
          return false;
    }

        public function get_report_reservations($id)
    {
      $reserve = DB::table('reservations')->where('reservations.clinic_id','=',$id)->count('reservations.clinic_id');
        if ($reserve)
          return $reserve;
        else
          return false;
    }

    public function get_report_nurse($id){
       $nurse = DB::table('clinic_employees')->where('clinic_employees.clinic_id','=',$id)
         ->join('users','clinic_employees.employee_id','=','users.id')
         ->where('users.role_id','=','1')
          ->where('users.is_active','=','1')
         ->distinct('users.id')
         ->count('users.id');
        if ($nurse)
          return $nurse;
        else
          return false;
    }

     public function get_report_clinic($id){
      $owner_id = $this->getOwnerByClinic($id);
       $clinic = DB::table('clinics')->where('clinics.owner_id','=',$owner_id)
         ->where('clinics.is_active','=','1')
         
         ->count('clinics.id');
        if ($clinic)
          return $clinic;
        else
          return false;
    }


    public function getOwnerByClinic($id){
       $owner = DB::table('clinics')
       ->where('clinics.id','=',$id)
       ->get();
       $owner_id = $owner[0]->owner_id;
       return $owner_id;
    }
  

    public function registerObserver($observer){
      array_push($this->observers,$observer);
    }
    public function removeObserver($observer){
      $this->observers = array_diff($this->observers, [$observer]);
    }
    public function notifyObservers($title,$message){
      foreach ($this->observers as $observer) {
        $observer->classupdate(Auth::id(),$title,$message);
      }
    }


}
