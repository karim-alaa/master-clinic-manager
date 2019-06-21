<?php
use App\specialization;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class specializationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

            public function testgetAllSpecializations()
    {
         
          $specia = new specialization();
    	    	 
        $this->assertEquals(true,!empty($specia->getAllSpecializations()));
    }
}