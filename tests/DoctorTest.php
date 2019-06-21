<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Doctor;
use App\Offer;
use App\workTime;

class DoctorTest extends TestCase
{
    // dataForTest
    // offerId = 22
    // doctorId = 2
    // clinicId = 30
    // doctorMail = "karimalaa500@yahoo.com"


    public function testUpdateDoctorProfile(){
        $doctor = new Doctor();
          $doctor->username = "mohamedSDF";
          $doctor->email = "mohamed@man.com";
          $doctor->address = "egypt, cairo";
          $doctor->age = 42;
          $doctor->phone = "01441771881";
          $doctor->sp_id = 1;
        $this->assertEquals(true,$doctor->UpdateDoctorProfile($doctor));   
    }

    public function testGetDoctorById(){
        $doctor = new Doctor();
        $this->assertEquals(true,!empty($doctor->getDoctorById(22)));
    }

    public function testSearchDoctor(){
        $doctor = new Doctor();
        $this->assertEquals(true,!empty($doctor->searchDoctor("karimalaa500@yahoo.com")));
    }

    public function testGetOldCV(){
        $doctor = new Doctor();
        $this->assertEquals(true,!empty($doctor->getOldCV(22)));
    }

    public function testSaveCV(){
       // $doctor = new Doctor();
       // $this->assertEquals(true,!empty($doctor->saveCV(,22)));
    }

    public function testDownloadMyCV(){
        $doctor = new Doctor();
        $this->assertEquals(null,$doctor->downloadMyCV(22));
    }
    public function testgetOfferById(){
        $doctor = new Doctor();
        $this->assertEquals(true,($doctor->getOfferById(8)->count()));
    }

     public function testListAllOffers(){
        $doctor = new Doctor();
        $this->assertEquals(true,($doctor->listAllOffers(22)->count()));
    }
    
    public function testRejectOffer(){
         $doctor = new Doctor();
        $this->assertEquals(true,$doctor->rejectOffer(8));
                //RollBack
         DB::table('offer')->where('id', 8)->update(['is_active' => '1',]);
    } 

    public function testAcceptOffer(){
         $doctor = new Doctor();
         $offer = new Offer();
         $offer->id = 8;
        $this->assertEquals(true,$doctor->acceptOffer($offer));
        //RollBack
         DB::table('offer')->where('id', 8)->update(['is_accepted' => '0',]);
    } 
   
    public function testEmployeeDoctor(){
        $doctor = new Doctor();
        $offer = new Offer();
        $offer->clinic_id = 30;
        $this->assertEquals(true,$doctor->employeeDoctor($offer,22));
        //RollBack
        //NO ROLL BACK
    }
    
   public function testSetWorkTime(){
        $doctor = new Doctor();
        $offer = new Offer();
        $time = new workTime();
        
        $offer->offer_id = 8;
       for ($i=1; $i <= 7; $i++) { 
           $time->checks[$i] = true;
           $time->days[$i] = $i;
           $time->patient_num[$i] = 41;
           $time->from[$i] = 9;
           $time->to[$i] = 11;
       }
        $this->assertEquals(true,$doctor->setWorkTime($time,$offer,22));
    }

    public function testGetTimetable(){
        $doctor = new Doctor();
        $this->assertEquals(true,!empty($doctor->getTimetable(22)));
    }
     
    public function testGetdoctorData(){
        $doctor = new Doctor();
        $date = "2016-04-10 13:15:07";
        $this->assertEquals(true,!empty($doctor->getdoctorData(22,$date)));
    }

     
}
