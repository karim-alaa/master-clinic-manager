<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Sms;
use App\Employee;
use App\Reservation;
use App\EditNurseProfile;
use App\EditNurseProfi;
use App\observer;
use DB;
use Carbon\Carbon;

class Nurse extends Employee implements Observer
{
     private $salary;


         public function Setsalary($salary)
    {
      
      $this->salary = $salary;

    }

    public function Getsalary()
    {

        return $this->salary;
    }

     public function RegistPatient($patient)
     {
           
              
          DB::table('users')->insert([
          ['name' => $patient->Getusername(), 'email'=> $patient->Getemail(),'password'=>bcrypt('$patient->Getpassword()'),
           'nationality_id'=> $patient->Getnationality_id(),'is_male'=>$patient->is_male,
           'role_id'=>'4','avatar' => $patient->Getavatar_org(),
           'is_active'=>'1','age'=>$patient->Getage(), 'phone'=>$patient->Getphone() ,'address'=>$patient->Getaddress()]
          ]);
          
          return true;

      }

      public function getReserveById($res_id){
                $results = DB::table('reservations')->where('id','=',$res_id)->get();
                
                if($results)
                  return $results;
            return false;

      }

public function ReserveAppointment($reservation){
        $count=0;
        $patientid= DB::table('users')->select('users.id')->where('users.nationality_id','=',$reservation->GetPatientNationId())->get();
        $tecketnum= DB::table('reservations')
        //->select('reservations.tecket_num')
        ->where('reservations.date','=',$reservation->GetDate())
        ->where('reservations.doctor_id','=',$reservation->GetDoctorId())
        //->get();
        ->count();
        if($tecketnum)
          $tecketnum = $tecketnum + 1;
        else 
          $tecketnum = 1;
       /* foreach ($tecketnum as $num){
          $count++;
        }
        if($count > 0)
        { 
          $tecket_num=$tecketnum[$count - 1]->tecket_num;
          $tecket_number =$tecket_num + 1;
        }
        else{
          $tecket_number = 1;
        }*/
        if($patientid){
        $patient_id = $patientid[0]->id;
   
        DB::table('reservations')->insert([
        ['patient_id' => $patient_id,'doctor_id'=>$reservation->GetDoctorId(),'is_examination'=>'1',
         'tecket_num'=>$tecketnum,'patient_nation_id'=>$reservation->GetPatientNationId(),
         'date'=>$reservation->GetDate(),'nurse_id'=>$reservation->GetNurseId() ,'clinic_id'=>$reservation->Getclinic_Id(),
         'is_active'=>'1']
        ]);
        return true;
      }
        return false;
     }
  /*   public function ReserveAppointment($reservation){
        $count=0;
        $patientid= DB::table('users')->select('users.id')->where('users.nationality_id','=',$reservation->GetPatientNationId())->get();
        $tecketnum= DB::table('reservations')->select('reservations.tecket_num')
        ->where('reservations.date','=',$reservation->GetDate())
        ->where('reservations.doctor_id','=',$reservation->GetDoctorId())
        ->get();
        foreach ($tecketnum as $num){
          $count++;
        }
        if($count > 0)
        { 
          $tecket_num=$tecketnum[$count - 1]->tecket_num;
          $tecket_number =$tecket_num + 1;
        }
        else{
          $tecket_number = 1;
        }
        if($patientid){
        $patient_id = $patientid[0]->id;
        DB::table('reservations')->insert([
        ['patient_id' => $patient_id,'doctor_id'=>$reservation->GetDoctorId(),'is_examination'=>'1',
         'tecket_num'=>$tecket_number,'patient_nation_id'=>$reservation->GetPatientNationId(),
         'date'=>$reservation->GetDate(),'nurse_id'=>$reservation->GetNurseId() ,'clinic_id'=>$reservation->Getclinic_Id(),
         'is_active'=>'1']
        ]);
        return true;
      }
        return false;
     }*/

     public function CancleReservation($id){

       DB::table('reservations')->where('id', '=', $id)->delete();
       return true;
     }

     public function UpdateReservation($reservation,$id)
     {


                $results = DB::table('reservations')->where('patient_name','=',$patient->Getusername())->where('patient_nation_id','=',$patient->Getnationality_id())->get();
                
                if($results)
                  return false;
               DB::table('reservations')
                   ->where('id',$id)
                   ->update(['patient_id' => $patient->Getusername(),'patient_nation_id'=>$patient->Getnationality_id()
                           ]);
                return true;

     }

     public function getAvatarLink($gender){
                    $digits = 11;
                   $default_avatar = "";
                   $default_man_avatar = "image\users\default-man_avatar.jpg";
                   $default_woman_avatar = "image\users\default-woman_avatar.jpg";

                   if($gender == '1'){
                      $default_avatar =  $default_man_avatar;
                   }else if ($gender == '2') {
                       $default_avatar =  $default_woman_avatar;
                   }
             return $default_avatar;

     }

     public function register(){

        $results = DB::table('users')->where('email','=',$this->Getemail())->get();
        if($results){
            if($results[0]->is_active == 1){
                return false;
            }
 
           // var_dump($results);
            DB::table('users')
                   ->where('id', $results[0]->id)
                   ->update
                   ([
                      // 'avatar'          => $this->avatar,
                       'name'            => $this->Getusername(),
                       'email'           => $this->Getemail(),
                       'password'        => $this->Getpassword(),
                       'nationality_id'  => $this->Getnationality_id(),
                       'is_male'         => $this->is_male,
                       'role_id'         => $this->role_id,
                       'is_active'       => '1'
                    ]);
 
            return $results[0]->id;
        
        }
             
        DB::table('users')->insert([
            ['name' => $this->Getusername(), 'email'=> $this->Getemail(),'password'=> $this->Getpassword(),
             'nationality_id'=> $this->Getnationality_id(),'is_male'=>$this->is_male,
             'role_id'=>$this->role_id,'avatar' => $this->Getavatar_org(),
             'is_active'=>'1']
                 ]);
        $results = DB::table('users')->where('email','=',$this->Getemail())->get();
        //var_dump($results);
        return $results[0]->id;
    }



       public function getNurseById($id){
            $nurse = DB::table('users')
            ->select('users.*')->where('users.id','=',$id)
            ->get();
            if($nurse)
                return $nurse;
            else
                return false;
    }



     public function UpdateNurseProfile($opj){
      $name = $opj->Getusername();
      $email = $opj->Getemail();
      $address = $opj->Getaddress();
      $age = $opj->Getage();
      $phone = $opj->Getphone();
      $nationality_id = $opj->Getnationality_id();
      var_dump($opj->Getusername());
      DB::table('users')
            ->where('id', $opj->Getid())
            ->update(['name' => $name,
                      'address' => $address,
                      'age' => $age,
                      'phone' => $phone,
                       'nationality_id' => $nationality_id , 'email' => $email]);

            return true;
    }
     





      public function getreserve($reservation)
      { 
       
        $query = DB::table('reservations')
                ->join('users','users.id','=','reservations.patient_id')
                ->where('reservations.clinic_id','=',$reservation->clinicId)
                ->where('reservations.date','>',date('Y-m-d',(strtotime ( '-1 day' , strtotime ( date('y-m-d')) ) )));
         $query->where('reservations.is_active','=','1');
        if($reservation->DoctorId){
          $query->where('reservations.doctor_id','=',$reservation->DoctorId);
        }

        if($reservation->Date){
          $query->where('reservations.date','=',$reservation->Date);
        }
        else{
          $query->where('reservations.date','=',date('Y-m-d'));
        }

        if($reservation->IsExmnation){
          $query->where('reservations.is_examination','=',$reservation->IsExmnation);
        }

        $results = $query->select('reservations.*','users.name','users.nationality_id')->get();
        if($results)
          return $results;
        return [];
      }


    public function getDayNumber(){
        $today = date('D');
        $day_number = DB::table('days')->where('day', '=', $today)->get();
        return $day_number[0]->id;

    }


        public function classupdate($noifier_id,$title,$message){
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
