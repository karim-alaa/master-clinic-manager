<?php
use App\ClinicOwner;
use App\Clinic;
use App\User;
use App\Offer;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClinicOwnerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
  /* public function testaddClinic()
   {
   	$c = new Clinic();
 $c->name ='Mohamed';
              $c->address ='Elsalam';
               $c->phone ='01148430734';
               $c->description ='3yada for batna';

   $clinicowner = new ClinicOwner();
    $this->assertEquals(true,$clinicowner->addClinic($c));

   }
*/
    public function testdeleteClinic()
    {
         
         $clinicowner = new ClinicOwner();
    	    	 
        $this->assertEquals(true,$clinicowner->deleteClinic(31));

                        //RollBack
         DB::table('clinics')->where('id', 31)->update(['is_active' => '1',]);
    }


   public function testupdateClinic()
   {
   	   	     $c = new Clinic();
             $c->name ='Mohamed';
             $c->address ='Elsalam';
             $c->phone ='01148430734';
             $c->description ='3yada for batna';
   	$clinicowner = new ClinicOwner();

 $this->assertEquals(true,$clinicowner->updateClinic($c,31));

   }

  /*    public function testshowClinics()
   {
   	$clinicowner = new ClinicOwner();

   	$this->assertEquals(true,$clinicowner->showClinics($c,31));
   	
   }
*/
     public function testsearchDoctor()
   {
   	
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,!empty($clinicowner->searchDoctor("karimalaa500@yahoo.com")));
   	
   	
   }


      public function testsack()
   {
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,$clinicowner->sack(28));

   }



      public function testgetOwnerById()
   {
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,!empty($clinicowner->getOwnerById(22)));
   	
   }

      public function testUpdateOwnerProfile()
   {
   	$opj = new User();
   	   $opj->username = "Nancy agram";
       $opj->Setemail("karimalaa500@yahoo.com");
       $opj->address= "cairo";
       $opj->age = '55';
       $opj->phone= '01141442423';
       $opj->nationality_id='12345612345611';
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,$clinicowner->UpdateOwnerProfile($opj));
   	
   }

      public function testgetClinicsByDoctorID()
   {
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,!empty($clinicowner->getClinicsByDoctorID(22)));
   	
   }

      public function testshowAllDoctors()
   {
   	$clinicowner = new ClinicOwner();
   	$this->assertEquals(true,!empty($clinicowner->showAllDoctors()));
   }

      public function testsendOffer()
   {
   	$opj = new Offer();
   	    $opj->name = "Mohamed";
        $opj->description = "Doctor Batne";
        $opj->clinic_id = '30';
        $opj->doctor_id = '24';
        $opj->owner_id = '22';
   	$clinicowner = new ClinicOwner();
   	 $this->assertEquals(true,$clinicowner->sendOffer($opj));
   }

 /*     public function test()
   {
   	$clinicowner = new ClinicOwner();
   	
   }
*/
}
