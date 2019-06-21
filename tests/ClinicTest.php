<?php

use App\Clinic;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClinicTest extends TestCase
{
    



    public function testAddEmp()
    {
          $clinic = new Clinic();
    	    	 
        $this->assertEquals(true,$clinic->addEmp(30,29));
         
         DB::table('clinic_employees')
                   ->where('employee_id', 29)
                   ->update(['is_active' => '0']);
    }

}
