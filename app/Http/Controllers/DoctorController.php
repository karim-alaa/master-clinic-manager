<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\User;
use App\specialization;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;
use App\Doctor;
use App\Reservation;
use Session;
use App\ClinicOwner;
use App\workTime;



class DoctorController extends Controller
{

        public function __construct()
    {
       // $this->middleware('doctor');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
  /*   public function edit($id)
    {

       $user = new Doctor();
     //  $sp = new specialization();
       $doctor = $user->getDoctorById(Auth::id());
        // $specialization = $sp->getAllSpecializations();
    if($doctor == false /*|| $specialization == false)
        return 'Oops!!';
  // Session::put('specializations', $specialization);

    
        return view('users.profile')->with('doctor',$doctor);
    }
*/

    public function edit($id)
    {
        $user = new Doctor();
        $sp = new specialization();
        $doctor = $user->getDoctorById(Auth::id())[0];
        $oldcv = $user->getOldCV(Auth::id())[0];

         $specialization = $sp->getAllSpecializations();
    if($doctor == false  )
       return redirect('errors.503');
     
                  return view('users.profile')->with('doctor',$doctor)
                                              ->with('oldcv', $oldcv->cv)
                                              ->with('sp',$specialization);
    }
   
    public function update(Request $request, $id)
    {


    }



    public function updateDoctor(Request $request, $id){

    $validator = Validator::make($request->all(),[
              // 'phone' => 'required|digits:11|numeric',
             'name' =>  'required|max:15|min:8',
             'email' => 'required|email|max:50',
             'nationality_id' =>'required|numeric|digits:14',
             'address' => 'max:50',
             'phone' => 'numeric|digits:11',
             'age' => 'numeric|max:80|min:1',
             'sp_id' => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

           $user = new Doctor();

     //  $user = $user->getDoctorById(Auth::id());
         $id = Auth::id();
         $email    = Input::get('email');
         $nationality_id    = Input::get('nationality_id');
         $username    = Input::get('name');
         $address    = Input::get('address');
         $phone    = Input::get('phone');
         $age    = Input::get('age');
         $sp_id    = Input::get('sp_id');


          $user->Setid($id);
         $user->Setemail($email);
         $user->Setnationality_id($nationality_id);
         $user->Setusername($username);
         $user->Setaddress($address);
         $user->Setphone($phone);
         $user->Setage($age);
         $user->Setsp_id($sp_id);
         $user->UpdateDoctorProfile($user);
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



    public function saveDoctorCV(Request $request,$id){
         $validator = Validator::make($request->all(),[
           'cv' => 'required|mimes:pdf,zip,rar,txt,docx|max:3000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
           $cv = Input::file('cv');
           $doctor = new Doctor();
         $check = $doctor->saveCV($cv,$id);
          if($check){
            return redirect()->back();
          }
          else{
            return 'Make Sure That You In The Right Way';
          }
         
            
        }

        
       }
    


    public function downloadCV($id){
          
          $doctor = new  Doctor();
        $result =  $doctor->downloadMyCV($id);
          if($result == false)
            return 'Oops.. Cannot Access This File, Or File Not Found';
        else
           // return $result;
        return redirect()->back();
    }


   public function showAllDoctors(){
          $owner = new ClinicOwner();
          $doctors = $owner->showAllDoctors();
          return view('clinic.listDoctors')->with('doctors',$doctors);
    }


    public function confirmOffer(Request $request, $id){
       $doctor = new Doctor();
       $offer = $doctor->getOfferById($id)[0];
          return view('clinic.confirmOffer')->with('offer',$offer);
    }


    public function acceptOffer(Request $request, $offer_id){
            $validator = Validator::make($request->all(),[
                'checkarr' => 'required',
           ]);
        if ($validator->fails()){
              return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
        }else{
             $time = new workTime();
                  for ($i=1; $i <= 7; $i++) { 
                         if( null !== (Input::get('checkarr')) && in_array('day'.$i.'',Input::get('checkarr'))){
                             $time->checks[$i] = true;
                               if(('' == (Input::get('day'.$i.'_to')) || ('' == (Input::get('day'.$i.'_from'))))){
                                     $time->to[$i] =  '10';
                                     $time->from[$i] = '8';
                                     if (null == (Input::get('patient_num_'.$i.''))) {
                                        $time->patient_num[$i] = '25';
                                     }else{$time->patient_num[$i] = Input::get('patient_num_'.$i.'');}
                               }else{
                                 $time->to[$i] = Input::get('day'.$i.'_to');
                                 $time->from[$i] = Input::get('day'.$i.'_from');
                                 if (null == (Input::get('patient_num_'.$i.''))) {
                                    $time->patient_num[$i] = '25';
                                 }else{$time->patient_num[$i] = Input::get('patient_num_'.$i.'');}
                               }
                         }else{
                             $time->checks[$i] = false;
                         }
                  }
//just for test//return 'from '.$time->from[5].' and to '.$time->to[5].' over '.$time->patient_num[5].' patient';
             $doctor = new Doctor();
             $offer = $doctor->getOfferById($offer_id)[0];
             if($doctor->setWorkTime($time,$offer,Auth::id()))
               return redirect('offer/'.Auth::id().'/listOffers')->withErrors(array('added'=> trans('alerts.acceptOffer') ));
             else
               
 return redirect()->back()->withErrors(array('cannotAdd'=>'Cannot Accept This Offer You Have Opposed at times'));
     
 
        }

    }

 


 
    public function getDoctor($id,$date){
      return '{ "doctors" : '.json_encode(Doctor::getdoctorData($id,$date)).'}';
    }


    public function myAppintment(){
      $doctor = new Doctor();
      $myClinics =  $doctor->getMyClinics(Auth::id());
      if($myClinics){
      session(['doctor_clinic_id' => $myClinics[0]->id]);
      $Appointment = $doctor->doctorReservations($myClinics[0]->id,Auth::id());
      return view('diagnosis.doctorAppointment')
               ->with('myClinic', $myClinics)
               ->with('Appointment', $Appointment);
             }
             else
              return view('errors.503');
    }

     public function myAppintmentByClinic(Request $request){
      $doctor = new Doctor();
      $myClinics =  $doctor->getMyClinics(Auth::id());
          $clinic_id = $request->input('clinic');
           session(['doctor_clinic_id' => $clinic_id]);
      $Appointment = $doctor->doctorReservations($clinic_id,Auth::id());
      return view('diagnosis.doctorAppointment')
               ->with('myClinic', $myClinics)
               ->with('Appointment', $Appointment);
    }

   

   

     public function editPDMA(){
        $doctor = new Doctor();
       
       $myClinics =  $doctor->getMyClinics(Auth::id());

            if($myClinics){
        $parades = $doctor->getClinicParades($myClinics[0]->id,Auth::id());
        $medicines = $doctor->getClinicMedicines($myClinics[0]->id,Auth::id());
        $diseases = $doctor->getClinicDiseases($myClinics[0]->id,Auth::id());
        $analysis = $doctor->getClinicAnalysis($myClinics[0]->id,Auth::id());
       
       session(['doctor_editPDMA_clinic_id' => $myClinics[0]->id]);
             
       $paradesString  = "";
       $medicinesString  = "";
       $diseasesString  = "";
       $analysisString  = "";
       if($parades != null){
          foreach ($parades as $parade) {
            $paradesString .= ','.$parade->name;
          }
        }
        if($medicines != null){
          foreach ($medicines as $medicine) {
            $medicinesString .= ','.$medicine->name;
          }
        }
        if($diseases != null){
          foreach ($diseases as $disease) {
            $diseasesString .= ','.$disease->name;
          }
        }
        if($analysis != null){
          foreach ($analysis as $analys) {
            $analysisString .= ','.$analys->name;
          }
        }

         
           

        return view('diagnosis.editClinicPDMA')
             
                ->with('parades', $paradesString)
                ->with('medicines', $medicinesString)
                ->with('diseases', $diseasesString)
                ->with('analysis', $analysisString)
                ->with('myClinic', $myClinics);
 }
             else
              return view('errors.503');
   
    }



     public function editClinicPDMA(Request $request){
        $doctor = new Doctor();
       $clinic_id = $request->input('clinic');
       $myClinics =  $doctor->getMyClinics(Auth::id());

      

        if($clinic_id){
               // do no thing
        }else{
          $clinic_id = session('doctor_editPDMA_clinic_id');
        }
        $parades = $doctor->getClinicParades($clinic_id,Auth::id());
        $medicines = $doctor->getClinicMedicines($clinic_id,Auth::id());
        $diseases = $doctor->getClinicDiseases($clinic_id,Auth::id());
        $analysis = $doctor->getClinicAnalysis($clinic_id,Auth::id());
        
         session(['doctor_editPDMA_clinic_id' => $clinic_id]);
             
       $paradesString  = "";
       $medicinesString  = "";
       $diseasesString  = "";
       $analysisString  = "";

       if($parades != null){
          foreach ($parades as $parade) {
            $paradesString .= ','.$parade->name;
          }
        }
        if($medicines != null){
          foreach ($medicines as $medicine) {
            $medicinesString .= ','.$medicine->name;
          }
        }
        if($diseases != null){
          foreach ($diseases as $disease) {
            $diseasesString .= ','.$disease->name;
          }
        }
        if($analysis != null){
          foreach ($analysis as $analys) {
            $analysisString .= ','.$analys->name;
          }
        }

         
           

        return view('diagnosis.editClinicPDMA')
             
                ->with('parades', $paradesString)
                ->with('medicines', $medicinesString)
                ->with('diseases', $diseasesString)
                ->with('analysis', $analysisString)
                ->with('myClinic', $myClinics);

   
    }


     public function storePDMA(Request $request){
   
             $parades = $request->input('parades');
             $diseases = $request->input('diseases');
             $medicines = $request->input('medicines');
             $analysis = $request->input('analysis');
             $clinic_id = session('doctor_editPDMA_clinic_id');


             $parades_array = explode(",", $parades[0]);
             $diseases_array = explode(",", $diseases[0]);
             $medicines_array = explode(",", $medicines[0]);
             $analysis_array = explode(",", $analysis[0]);
 

 

                $doctor = new Doctor();

        if($doctor->editClinicPDMA($parades_array,$diseases_array,$medicines_array,$analysis_array,$clinic_id))
                    return redirect()->back()->withErrors(array('added'=> trans('alerts.updateData') ));
                else
                    return view('errors.503');
 
    }

   


     
}
