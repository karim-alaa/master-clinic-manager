<?php

namespace App;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    private $id;
    private $name;
    private $description;
    private $phone;
    private $address;




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


        public function Setphone($phone)
    {
      
      $this->phone = $phone;

    }

    public function Getphone()
    {

        return $this->phone;
    }


        public function Setaddress($address)
    {
      
      $this->address = $address;

    }

    public function Getaddress()
    {

        return $this->address;
    }


    



    public function showClinic($id){
       $clinic = DB::table('clinics')
       ->where('owner_id','=',Auth::id())
       ->where('id','=',$id)
       ->where('is_active','=','1')
       ->get(); // where is_active = 0

     //  var_dump($clinic); 
        return $clinic;
    }

      public function getEmps($id){
       $emps = DB::table('clinic_employees')
       ->join('users', 'clinic_employees.employee_id', '=', 'users.id')
       ->join('roles', 'users.role_id', '=', 'roles.id')
       ->select( 'users.*', 'roles.role')
       ->distinct('users.id')
       ->where('clinic_employees.clinic_id' ,'=',$id)
       ->where('clinic_employees.is_active' ,'=','1')
       ->get(); // where is_active = 0

      // var_dump($emps); 
        return $emps;
    }

       public function addEmp($cid,$eid){
      $results = DB::table('clinic_employees')->where('clinic_id','=',$cid)
                                              ->where('employee_id','=',$eid)
                                              ->get();
      if($results){
        if($results[0]->is_active == 1)
            return false;
         // echo "log";
        DB::table('clinic_employees')
            ->where('id', $results[0]->id)
            ->update(['is_active' => '1']);
        return true;
   
      }
      $r = DB::table('clinic_employees')->insert([
        ['clinic_id' => $cid, 'employee_id'=> $eid, 'is_active'=>'1',
          'employment_date'=> date("Y-m-d")]
        ]);

      return true;     
    }
}
