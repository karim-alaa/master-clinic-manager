<?php
use App\Email;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmailTest extends TestCase
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

       public function testSend()
    {
         
          $email = new Email();
    	    	 
        $this->assertEquals(true,$email->Send(22,29));
    }

}

