<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Image;
use Hash;
use Auth;
use App\User;
use App\Nurse;
use App\ClinicOwner;
use App\Notify;
use App\Doctor;
use App\Email;
use App\Clinic;
use App\Offer;
 
use Session;
use Illuminate\Support\Facades\Input;

class OfferController extends Controller
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
    public function edit($id)
    {
        //
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
       $doctor = new Doctor();
       $result = $doctor->rejectOffer($id);
       if($result)
        return redirect()->back();
       else
        return 'Sorry, May Be This Offer Have Been Deleted';
    }


    public function listAllOffers(Request $request, $id){
        $doctor = new Doctor();
        $user = new User();
       
        $user->removeNewNotfiy(Auth::id(),'offer');
           $n = new Notify();

        //var_dump($n->getMyNotifications());
        Session::put('not', $n->getMyNotifications());
        $offers = $doctor->listAllOffers($id);
        return view('clinic.listOffers')->with('offers',$offers);
    }



    public function addNewOffer($doctor_id){
           $owner = new ClinicOwner();
           $clinics = $owner->getClinicsByDoctorID(Auth::id());
           return view('clinic.addOffer')->with('clinics',$clinics)->with('doctor_id',$doctor_id);
    }



    public function sendOffer(Request $request,$id){
            
    $validator = Validator::make($request->all(),[
            // 'phone' => 'required|digits:11|numeric',
             'name' =>  'required|max:20|min:5',
             'description' => 'required|max:300|min:10',
             'clinic_id' => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

         $offer = new Offer();
         $owner = new ClinicOwner();
         $name    = Input::get('name');
         $description    = Input::get('description');
         $clinic_id    = Input::get('clinic_id');
         $alretMethod    = Input::get('method');
         $doctor_id    = $id;
         $owner_id    = Auth::id();

         $offer->Setname($name);
         $offer->Setdescription($description);
         $offer->Setclinic_id($clinic_id);
         $offer->SetalretMethod($alretMethod);
         $offer->Setdoctor_id($doctor_id);
         $offer->Setowner_id($owner_id);
        // echo $offer->alretMethod;
         $result =  $owner->sendOffer($offer);
    
        return redirect('doctor/listDoctors')->withErrors(array('added'=> trans('alerts.sendOffer') ));
       }
    }

}
