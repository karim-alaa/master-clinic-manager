<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Validator;
use Image;
use Hash;
use Auth;
use App\User;
use App\Nurse;
use App\Clinic;
use App\Doctor;
use App\Reservation;
use DB;
use Session;

class NurseController extends Controller
{

    public function __construct()
    {
       // $this->middleware('nurse');
        // $this->middleware('owner');
    }
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
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {

       
        $validator = Validator::make($request->all(),[
            // 'phone' => 'required|digits:11|numeric',
             'name' =>  'required|max:20|min:5',
             'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:6',
             'nationality_id' =>'required|numeric|digits:14|unique:users',
          ]);
          
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        
        $u =new Nurse();
        $u->Setusername($request->input('name'));
        $u->Setemail($request->input('email'));
        $u->Setpassword(bcrypt($request->input('password')));
        $u->Setnationality_id($request->input('nationality_id'));

        $u->role_id = $request->input('role_id');
        $u->is_male = $request->input('gender');
 
        $default_avatar = $u->getAvatarLink($u->is_male);
        $u->Setavatar_org($default_avatar);
        
        if($u_id = $u->register()){

            $c=new Clinic();
            $c->addEmp(Session::get('clinic_id'),$u_id);
            return redirect('clinic/emps/'.Session::get('clinic_id'));
        }
       }
     //   return "error";
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
        
       $user = new Nurse();
       $nurse = $user->getNurseById(Auth::id())[0];
    if($nurse == false  )
        return 'Oops!!';
 
        return view('users.userprofile')->with('nurse',$nurse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


public function updateNurse(Request $request, $id){

    $validator = Validator::make($request->all(),[
            // 'phone' => 'required|digits:11|numeric',
             'name' =>  'required|max:15|min:8',
             'email' => 'required|email|max:50',
             'nationality_id' =>'required|numeric|digits:14',
             'address' => 'max:50',
             'phone' => 'numeric|digits:11',
             'age' => 'numeric|max:80|min:1',
          ]);

        if ($validator->fails()) {
            return redirect('/nurse/'.Auth::id().'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

           $user = new Nurse();

     //  $user = $user->getDoctorById(Auth::id());
         $user->Setid(Auth::id());
         $user->Setemail(Input::get('email'));
         $user->Setnationality_id(Input::get('nationality_id'));
         $user->Setusername(Input::get('name'));
         $user->Setaddress(Input::get('address'));
         $user->Setphone(Input::get('phone'));
         $user->Setage(Input::get('age'));
         $user->UpdateNurseProfile($user);

        return redirect()->back();
       }
    }
 
   




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




   public function reserveNew()
   {
        return view('clinic.reserveAsNew');
   }

    public function reserveOld(){
     return view('clinic.reserveAsOld');
   }
    

    public function timetable(){
 
       $timetable = Doctor::getTimetable(Auth::id());
       
       if($timetable != "error"){
       $docIds = array_unique(array_map(create_function('$o', 'return $o->name;'), $timetable));
       $docDays =  array();
       foreach ($docIds as $key => $value) {
           $docDays[$value] = $this->findObjectById($value,$timetable);;
       }
       if($timetable)
        return view('clinic.timetable')->with('timetable',$timetable)
        ->with('doctorInDays',$docDays);
      }else
      return view('errors.503');
    }

    public function filterReservations($day,$doc)
    {
       $nurse = new Nurse();
       $reservation = new Reservation();
       $reservation->DoctorId = $doc;
       $reservation->Date = $day;
        $cId = DB::table('clinic_employees')->select('clinic_id')->where('employee_id','=',Auth::id())->get();
       if($cId){
            $reservation->clinicId = $cId[0]->clinic_id;
        }
    //    var_dump($reservation);
        $reservedata="";
        $reservedata = $nurse->getreserve($reservation);
       return '{ "reservations" : '. json_encode($reservedata).'}'; 
    }
    
    public function getReservations()
    {
       
       $nurse = new Nurse();
       $doctors = [];
       $reservedata = [];
       $reservation = new Reservation();
         $today = date('Y-m-d');
       $reservation->Date = $today;
       //$reservation->Date='0000-00-00';
       $cId = DB::table('clinic_employees')->select('clinic_id')->where('employee_id','=',Auth::id())->get();
       if($cId){
            $reservation->clinicId = $cId[0]->clinic_id;
            //$d = new DateTime('Y-m-d');
             $day_number = $nurse->getDayNumber();
        
            $doctors  = Doctor::getdoctorData(Auth::id(),$day_number);

             if(isset($doctors[0]->employee_id))
       //     if(count($doctors) > 0)
            $reservation->DoctorId = $doctors[0]->employee_id;
           
              
       }
       if($reservation->DoctorId)
        
         $reservedata = $nurse->getreserve($reservation);
       //var_dump($doctors);
       //return $doctors;
 
       return view('clinic.listReservations')->with('reservedata',$reservedata)
       ->with('doctors',$doctors); 
    } 
 
    private function findObjectById($docName,$array){
        $count=0;
        foreach ( $array as $element ) {
            if ( $docName == $element->name ) {
                $count++;
            }
       }
    return $count;
    }


}



