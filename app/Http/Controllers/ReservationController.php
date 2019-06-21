<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



use Illuminate\Support\Facades\Input;

use Validator;
use Image;
use Hash;
use Auth;
use DB;
use App\User;
use App\Nurse;
use App\Clinic;
use Session;
use App\Reservation;
use App\Doctor;


class ReservationController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function canselReservation($id){

       $nurse = new Nurse();
        if ($nurse->CancleReservation($id))
           //return '{ "reservations" : '. json_encode(true).'}'; 
            return redirect()->back();
        else
        return view('errors.503');
   }

   public function UpdateReservation(Request $request, $id){
        $validator = Validator::make($request->all(),['date' =>  'required',]);
        if ($validator->fails()) {return redirect()->back()->withErrors($validator)->withInput();}
       
       else{

           
           $nurse = new Nurse();
           $reservation = new Reservation();
          if($nurse->CancleReservation($id)){
         
         //$reservation->PatientName    = Input::get('name');
         $Date    = Input::get('date');
         $PatientNationId    = Input::get('nationality_id');
         $NurseId = Auth::id(); 
         $DoctorName = Input::get('doctor_name');

         $reservation->SetDate($Date);
         $reservation->SetPatientNationId($PatientNationId);
         $reservation->SetNurseId($NurseId);
         $reservation->SetDoctorId($DoctorName);
         $cId = DB::table('clinic_employees')->select('clinic_id')->where('employee_id','=',Auth::id())->get();
         if($cId){
           // $reservation->clinicId = $cId[0]->clinic_id;
            $reservation->Setclinic_Id($cId[0]->clinic_id);
         }
          
         if ($nurse->ReserveAppointment($reservation)){
             $reservation_data = $nurse->getReserveById($id)[0];

            return redirect('nurse/reservations');
        }
       }
           
       }
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
    }
     public function addpatient(Request $request)
    {
        //
                 $validator = Validator::make($request->all(),[
            
             'name' =>  'required|max:20|min:5',
             'email' => 'required|email|max:50',
             'password'=>'required|min:6',
             'nationality_id' =>'required|numeric|digits:14|unique:users',
             'address' => 'max:50',
             'phone' => 'numeric|digits:11',
             'age' => 'numeric|max:80|min:1',
           
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

          // $patient = new Patient();
           $nurse = new Nurse();
         

         
         $username    = Input::get('name');
         $email    = Input::get('email');
         $password = Input::get('password');
         $nationality_id    = Input::get('nationality_id');
         $address    = Input::get('address');
         $phone    = Input::get('phone');
         $age    = Input::get('age');
         $nurse->is_male = Input::get('gender');
          $default_avatar = $nurse->getAvatarLink($nurse->is_male);
          $nurse->Setavatar_org($default_avatar);

        $nurse->Setpassword($password);       
         $nurse->Setemail($email);
         $nurse->Setnationality_id($nationality_id);
         $nurse->Setusername($username);
         $nurse->Setaddress($address);
         $nurse->Setphone($phone);
         $nurse->Setage($age);
        

         if ($nurse->RegistPatient($nurse)){
            return redirect()->back()->withErrors(array('added'=> trans('alerts.addPatient') ));
        
        }
        else{return "error";}
    }
    }
    
    
    

      public function Update(Request $request,$id)
    {
        //
                 $validator = Validator::make($request->all(),[
                    'name' =>  'required|max:15|min:10',
                    'nationality_id' =>'required|numeric|digits:14',
                     ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
            $patient = new Patient();
            $username    = Input::get('name');
            $nationality_id    = Input::get('nationality_id');

            $patient->Setnationality_id($nationality_id);
            $patient->Setusername($username);
             if ($nurse->UpdateReservation($patient,$id))
            return redirect()->back();
        return "error";


       }
    }

   public function destroy($id)
    {
        $nurse = new Nurse();
        if ($nurse->CancleReservation($id))
            return redirect()->back();
        else
        return redirect('errors.503');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nurse = new Nurse();
        $reservation_data = $nurse->getReserveById($id)[0];
     return view('clinic.UpdateReservation')->with('reservation_data',$reservation_data);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

  public function reserve(Request $request)
    {

     
        $validator = Validator::make($request->all(),[
                 
          //   'name' =>  'required|max:15|min:5',
             'nationality_id' =>'required|numeric|digits:14',
             'date' =>  'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

           
           $nurse = new Nurse();
           $reservation = new Reservation();

         
         //$reservation->PatientName    = Input::get('name');
         $Date    = Input::get('date');
         $PatientNationId    = Input::get('nationality_id');
         $NurseId = Auth::id(); 
         $DoctorName = Input::get('doctor_name');

         $reservation->SetDate($Date);
         $reservation->SetPatientNationId($PatientNationId);
         $reservation->SetNurseId($NurseId);
         $reservation->SetDoctorId($DoctorName);
         $cId = DB::table('clinic_employees')->select('clinic_id')->where('employee_id','=',Auth::id())->get();
         if($cId){
           // $reservation->clinicId = $cId[0]->clinic_id;
            $res=$cId[0]->clinic_id;
            $reservation->Setclinic_Id($res);
         }
 
 
         if ($nurse->ReserveAppointment($reservation))
            return redirect()->back()->withErrors(array('added'=> trans('alerts.addData') ));;

            return redirect('nurse/'.Auth::id().'/reserve/patient/new');
    
        }
}

}
