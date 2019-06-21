<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
use DB;

class specialization extends Model
{
    private $name;
    private $description;

    public function Setname($name)
    {
      
      $this->name = $name;

    }

    public function Getname()
    {

        return $this->name;
    }

        public function Setdescription($description)
    {
      
      $this->description = $description;

    }

    public function Getdescription()
    {

        return $this->description;
    }
    


    public function getAllSpecializations(){
             $specialization = DB::table('specializations') 
            ->select('specializations.*')->where('specializations.is_active','=','1')
            ->get();
            if($specialization)
                return $specialization;
            else
                return false;
    }



}
