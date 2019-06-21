<?php

namespace App;

use App\EditProfile;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Employee extends User
{
    private $editProfile;
   // $editProfile = new EditProfile();

		private $email;
		private $password;
        protected $table = 'employees';


    public function SeteditProfile($editProfile)
    {
      
      $this->editProfile = $editProfile;

    }

    public function GeteditProfile()
    {

        return $this->editProfile;
    }


        public function Setemail($email)
    {
      
      $this->email = $email;

    }

    public function Getemail()
    {

        return $this->email;
    }


        public function Setpassword($password)
    {
      
      $this->password = $password;

    }

    public function Getpassword()
    {

        return $this->password;
    }

		public function EditProfile(){
		//	$editProfile.editProfile();
		}

		public function Registeration(){

		}

		public function Login(){

		}

		public function Logout(){

		}

		//public function ChangePassword(){}

		public function show($cid){
			$emps = DB::table('users')
	       	->join('clinic_employees', 'doctors.doctor_id', '=', 'clinic_employees.id')
            ->leftJoin('doctor', 'clinic_employees.user_id', '=', 'users.id')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->join('specializations', 'doctors.specialization_id', '=', 'specializations.id')
            ->select('doctors.*', 'clinic_employees.*', 'users.*', 'roles.*','specializations.*')
            ->get(); // where is_active = 0
            // where is_active = 0
	        return $emps;	
		}

}
