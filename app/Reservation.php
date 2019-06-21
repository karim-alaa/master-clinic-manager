<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Reservation extends Model
{
	public $Id;
    public $clinic_id;
    public $Date;
    public $DoctorId;
    public $NurseId;
    public $PatientName;
    public $PatientNationId;
    public $Num;
    public $IsExmnation;


        public function SetId($Id)
    {
      
      $this->Id = $Id;

    }

    public function GetId()
    {

        return $this->Id;
    }

        public function Setclinic_id($clinic_id)
    {
      
      $this->clinic_id = $clinic_id;

    }

    public function Getclinic_id()
    {

        return $this->clinic_id;
    }

        public function SetDate($Date)
    {
      
      $this->Date = $Date;

    }

    public function GetDate()
    {

        return $this->Date;
    }

        public function SetDoctorId($DoctorId)
    {
      
      $this->DoctorId = $DoctorId;

    }

    public function GetDoctorId()
    {

        return $this->DoctorId;
    }


        public function SetNurseId($NurseId)
    {
      
      $this->NurseId = $NurseId;

    }

    public function GetNurseId()
    {

        return $this->NurseId;
    }

        public function SetPatientName($PatientName)
    {
      
      $this->PatientName = $PatientName;

    }

    public function GetPatientName()
    {

        return $this->PatientName;
    }

        public function SetPatientNationId($PatientNationId)
    {
      
      $this->PatientNationId = $PatientNationId;

    }

    public function GetPatientNationId()
    {

        return $this->PatientNationId;
    }

        public function SetNum($Num)
    {
      
      $this->Num = $Num;

    }

    public function GetNum()
    {

        return $this->Num;
    }

        public function SetIsExmnation($IsExmnation)
    {
      
      $this->IsExmnation = $IsExmnation;

    }

    public function GetIsExmnation()
    {

        return $this->IsExmnation;
    }


    public function listReservation($date){
   		$clinic_id = DB::table('clinic_employees')
        			 	->select('clinic_employees.clinic_id')
         				->where('clinic_employees.employee_id','=',$id)->get();
        if($clinic_id){
            
       }
    }

   



}
?>