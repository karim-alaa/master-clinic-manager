<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alert;

class Sms extends Alert
{
    private $message;
    private $phone;


        public function Setmessage($message)
    {
      
      $this->message = $message;

    }

    public function Getmessage()
    {

        return $this->message;
    }


        public function Setphone($phone)
    {
      
      $this->phone = $phone;

    }

    public function Getphone()
    {

        return $this->phone;
    }

    public function Send(){
    	
    }
}
