<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorCv extends Model
{
    private $graduationYear;
    private $faculty;
    private $degree;
    private $specilization;


        public function SetgraduationYear($graduationYear)
    {
      
      $this->graduationYear = $graduationYear;

    }

    public function GetgraduationYear()
    {

        return $this->graduationYear;
    }


        public function Setfaculty($faculty)
    {
      
      $this->faculty = $faculty;

    }

    public function Getfaculty()
    {

        return $this->faculty;
    }


        public function Setdegree($degree)
    {
      
      $this->degree = $degree;

    }

    public function Getdegree()
    {

        return $this->degree;
    }


        public function Setspecilization($specilization)
    {
      
      $this->specilization = $specilization;

    }

    public function Getspecilization()
    {

        return $this->specilization;
    }
}
