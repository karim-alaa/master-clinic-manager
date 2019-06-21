<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Patient;
use App\Nurse;
use App\Reservation;

class NurseTest extends TestCase
{
    
    public function testRegistPatient()
    {
    	   $nurse = new Nurse();
           $patient = new Patient();

	           $patient->username = "kkkkkkk";
	           $patient->email = "kkkkkkk@yahoo.com";
	           $patient->password = "123456";
	           $patient->is_male = 1;
	           $patient->nationality_id = "14523654789654";
	           $patient->avatar_org = "sfdf";
	           $patient->age = 25;
	           $patient->address = "giza";
	           $patient->phone = "01145658975";


           $this->assertEquals(true,$nurse->RegistPatient($patient));           
    }

/*   public function testReserveAppointment(){
    	$nurse = new Nurse();
        $reservation = new Reservation();
		    
		     $reservation->clinic_id = 30;
		     $reservation->Date = date('d/m/y');
		     $reservation->DoctorId = 22;
		     $reservation->NurseId = 22;
		     $reservation->PatientName = "mosjfjjflghs";
		     $reservation->PatientNationId = "88888885555555";
		     $reservation->Num = 15;
		     $reservation->IsExmnation = 1;

        $this->assertEquals(true,$nurse->ReserveAppointment($reservation)); 
    }*/
    

    public function testCancleReservation(){
        $nurse = new Nurse();
    	$this->assertEquals(true,$nurse->CancleReservation(38)); 
    	//RollBack
         DB::table('reservations')->where('id', 38)->update(['is_active' => '1',]);
    }

   /* public function testUpdateReservation(){ // NOT END YET
    	$nurse = new Nurse();
    	$reservation = new Reservation();
    	$this->assertEquals(true,$nurse->UpdateReservation($reservation,38));
    }*/

    public function testGetAvatarLink(){
         $nurse = new Nurse();
         $this->assertEquals("image\users\default-man_avatar.jpg",$nurse->GetAvatarLink(1));
    }

    public function testRegister(){ // must have the date in database to return false
    	$nurse = new Nurse();

    	  $nurse->id = 27;
    	  $nurse->username = "yyyyyyyyy";
          $nurse->email = "yyyyyyyyy@yyyy.yyyy";
          $nurse->address = "yyyyyyyyy";
          $nurse->age = 12;
          $nurse->phone = "01145447586";
          $nurse->nationality_id = "123563214569878";

    	$this->assertEquals(false,$nurse->register());
    }

    public function testGetNurseById(){
    	$nurse = new Nurse();
    	$this->assertEquals(true,!empty($nurse->getNurseById(22)));
    }

    public function testUpdateNurseProfile(){
    	$nurse = new Nurse();

          $nurse->id = 27;
    	  $nurse->username = "yyyyyyyyy";
          $nurse->email = "yyyyyyyyy@yyyy.yyyy";
          $nurse->address = "yyyyyyyyy";
          $nurse->age = 12;
          $nurse->phone = "01145447586";
          $nurse->nationality_id = "123563214569878";


        $this->assertEquals(true,$nurse->UpdateNurseProfile($nurse));	
    }


    public function testGetReserve(){
    	$nurse = new Nurse();
    	$reservation = new Reservation();
    		 $reservation->clinic_id = 30;
		     $reservation->Date = date('d/m/y');
		     $reservation->DoctorId = 22;
		     $reservation->NurseId = 22;
		     $reservation->PatientName = "mosjfjjflghs";
		     $reservation->PatientNationId = "88888885555555";
		     $reservation->Num = 15;
		     $reservation->IsExmnation = 1;
    	$this->assertEquals(false,!empty($nurse->getreserve($reservation)));
    }

    
}
