<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    private $id;
    private $name;
    private $description;


        public function Setid($id)
    {
      
      $this->id = $id;

    }

    public function Getid()
    {

        return $this->id;
    }


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

    public function Add(){

    }

    public function Delete(){
    	
    }

    public function Update(){
    	
    }
}
