<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alert;
use DB;
use Auth;

class Notify extends Alert
{
    private $message;

        public function Setmessage($message)
    {
      
      $this->message = $message;

    }

    public function Getmessage()
    {

        return $this->message;
    }



    public function Send($opj){
    	
        $name = $opj->Getname();
        $description = $opj->Getdescription();
        $clinic_id = $opj->Getclinic_id();
        $doctor_id = $opj->Getdoctor_id();
        $owner_id = $opj->Getowner_id();
        $offer_date = date("Y-m-d");
 
        DB::table('offer')->insert([
              ['name' => $name, 'clinic_id'=> $clinic_id,
              'doctor_id' => $doctor_id, 
                'description' => $description,
               'is_active'=>'1','owner_id'=> $owner_id,
               'is_accepted'=>'0',
               'offer_date' => $offer_date
               ]
         ]);
  $results = DB::table('clinics')
              ->where('clinics.id','=',$clinic_id)
              ->get();
$link = "http://localhost:8000/offer/".$doctor_id."/listOffers";
$note = "You Have Offer From ".$results[0]->name;
        DB::table('notifications')->insert([
              ['new' => '1', 
              'notifier_id' => Auth::id(), 
                'note' => $note,
                'about' => 'offer',
                'link' => $link,
               'observer_id' => $doctor_id
               ]
         ]);


    }


    public function getMyNotifications(){
       // var_dump(Auth::id());
        $results = DB::table('notifications')
              ->join('users','notifications.notifier_id','=','users.id')
        			->where('observer_id','=',Auth::id())
        			->where('new','=','1')
        			->get();
        return $results;

    }
}
