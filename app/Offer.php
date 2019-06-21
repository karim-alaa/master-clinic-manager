<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    private $id;
    private $name;
    private $description;
    private $clinic_id;
    private $doctor_id;
    private $owner_id;
    private $offer_date;
    private $is_active;
    private $is_accepted;
    private $alretMethod;


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

        public function Setclinic_id($clinic_id)
    {
      
      $this->clinic_id = $clinic_id;

    }

    public function Getclinic_id()
    {

        return $this->clinic_id;
    }

        public function Setdoctor_id($doctor_id)
    {
      
      $this->doctor_id = $doctor_id;

    }

    public function Getdoctor_id()
    {

        return $this->doctor_id;
    }

        public function Setowner_id($owner_id)
    {
      
      $this->owner_id = $owner_id;

    }

    public function Getowner_id()
    {

        return $this->owner_id;
    }

        public function Setoffer_date($offer_date)
    {
      
      $this->offer_date = $offer_date;

    }

    public function Getoffer_date()
    {

        return $this->offer_date;
    }


        public function Setis_active($is_active)
    {
      
      $this->is_active = $is_active;

    }

    public function Getis_active()
    {

        return $this->is_active;
    }

        public function Setis_accepted($is_accepted)
    {
      
      $this->is_accepted = $is_accepted;

    }

    public function Getis_accepted()
    {

        return $this->is_accepted;
    }

        public function SetalretMethod($alretMethod)
    {
      
      $this->alretMethod = $alretMethod;

    }

    public function GetalretMethod()
    {
        return $this->alretMethod;
    }
}
