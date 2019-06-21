<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use Hash;
use Auth;
use App\User;
use App\Nurse;
use App\Patient;
use App\ClinicOwner;
use App\Notify;
use App\Email;
use App\Clinic;
use Session;
use DB;
use PDF;

class ClinicOwnerController extends Controller
{



    public function __construct()
    {
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
            $clinic = new ClinicOwner();
      // $clinic->name = 'jar';
      //$clinic->Add($clinic,'clinic'); 
           // $clinic->DeleteInfo(9,'clinic');
           // $clinic->name="said";
            //$clinic->UpdateInfo($clinic,9,'clinic');
             $doctors =  $clinic->Show('doctor');
            

          return view('try')->with('doctors',$doctors);
        
                 //  'ngn';
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
          $user = new ClinicOwner();
       $owner = $user->getOwnerById(Auth::id())[0];
    if($owner == false  )
        return 'Oops!!';
 
        return view('users.ownerprofile')->with('owner',$owner);
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





public function updateOwner(Request $request, $id){

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
            return redirect('/ClinicOwner/'.Auth::id().'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

           $user = new ClinicOwner();

     //  $user = $user->getDoctorById(Auth::id());
         $id = Auth::id();
         $email    = Input::get('email');
         $nationality_id    = Input::get('nationality_id');
         $username    = Input::get('name');
         $address    = Input::get('address');
         $phone    = Input::get('phone');
         $age    = Input::get('age');

         $user->Setid($id);
         $user->Setemail($email);
         $user->Setnationality_id($nationality_id);
         $user->Setusername($username);
         $user->Setaddress($address);
         $user->Setphone($phone);
         $user->Setage($age);
         $user->UpdateOwnerProfile($user);
        return redirect()->back();
       }
    }





    public function searchDoctor(Request $request){
        $ow = new ClinicOwner();
        $docs = $ow->searchDoctor($request->input('search'));
        return view('employee.search')->with('docs',$docs)->with('cls',$ow->showClinics());
    }

public function sack(Request $request){
       // return "helo";
        $ow= new ClinicOwner();
//        echo $request->input('eid');
        $docs = $ow->sack($request->input('eid'));

        return redirect('clinic/emps/'.$request->input('cid'));
       // return view('employee.search')->with('docs',$docs);
    }


       public function employ(Request $request){
        $n = new Notify();
        if($request->input('notify') == 2)
            $n = new Email(); 

        $ow= ClinicOwner::newOwner($n);
        $ow->notify($request->input('did'),'i offer you work for me in '.explode('**', $request->input('cid'))[1] );
        return redirect('clinic/emps/'.explode('**', $request->input('cid'))[0]);
        
    }



      public function showMyClinicHistory(){
      $owner = new ClinicOwner();
      $myClinics =  $owner->getMyClinics(Auth::id());
       if($myClinics){
      $history = $owner->getMyHistory($myClinics[0]->id);
      session(['owner_history_clinic_id' => $myClinics[0]->id]);
      return view('clinic.PatientHistory')
                 ->with('history', $history)
                 ->with('myClinic',$myClinics);
             }
             else
                return view('errors.503');
    }


    public function showMyClinicHistoryByClinic(Request $request){
      $owner = new ClinicOwner();
      $myClinics =  $owner->getMyClinics(Auth::id());
        $clinic_id = $request->input('clinic');
      $history = $owner->getMyHistory($clinic_id);
      session(['owner_history_clinic_id' => $clinic_id]);
      return view('clinic.PatientHistory')
                 ->with('history', $history)
                 ->with('myClinic',$myClinics);
    }


    public function getPatientHistory($patient_id){
        $patient = new Patient();

        $history = $patient->getMyHistory($patient_id);
 
       return PDF::load($history)->filename('Patient_History.pdf')->download();
        
   
        if($history)
            return view('clinic.listPatientHistory')->with('history',$history);
        else
            return view('errors.503');
    }



    public function report($id)
    {
        $owner = new ClinicOwner();
        $result =$owner->get_doc_num($id);
        $todat_reserve =$owner->get_today_reservations($id);
        $reserve = $owner->get_report_reservations($id);
        $nurse = $owner->get_report_nurse($id);
        $clinic = $owner->get_report_clinic($id);
        return view('clinic.report')
                    ->with('clinic',$clinic)
                    ->with('nurse',$nurse)
                    ->with('result',$result)
                    ->with('todat_reserve',$todat_reserve)
                    ->with('reserve',$reserve);
    }



   

}
