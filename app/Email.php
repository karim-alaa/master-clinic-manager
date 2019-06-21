<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alert;
use DB;

class Email extends Alert
{
    private $message;
    private static $ins;

    private __construct(){

    }


        public function Setmessage($message)
    {
      
      $this->message = $message;

    }

    public function Getmessage()
    {

        return $this->message;
    }

/*
        public function Setins($ins)
    {
      
      $this->ins = $ins;

    }

    public function Getins()
    {

        return $this->ins;
    }
*/
    public function __construct(){

    }
    public function Send($opj){


    return true;
    	//mail($results[0]->email, 'My Clinic', $msg);
    	
    }

    public static function getInstance(){
        if(static::$ins === null){
            static::$ins = new static();
        }
        return static::$ins;
    }
}
