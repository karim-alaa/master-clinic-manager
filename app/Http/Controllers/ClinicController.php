<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClinicOwner;
use App\Clinic;
use App\Doctor;
use App\Http\Requests;
use Session;
use Validator;


class ClinicController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('owner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicOwner = new ClinicOwner();
        $clinics = $clinicOwner->showClinics();
     //   return 'eeee';
        return view('clinic.index')->with('clinics',$clinics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return "heloo";
         $validator = Validator::make($request->all(),[
           
             'name' =>  'required|max:20|min:5',
             'address' => 'required',
             'description' => 'min:20|max:200',
             'phone' => 'numeric|digits:11',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        $clinicOwner = new ClinicOwner();
        $c =new Clinic();

        $name= $request->input('name');
        $address= $request->input('address');
        $description= $request->input('description');
        $phone= $request->input('phone');

        $c->Setname($name);
        $c->Setaddress($address);
        $c->Setdescription($description);
        $c->Setphone($phone);
        if ($clinicOwner->addClinic($c))
            return redirect('clinic')->withErrors(array('added'=> trans('alerts.addClinic') ));
        return "error";
       }
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
        $c =new Clinic();
       // $clinic = new Clinic();
        $clinic = $c->showClinic($id)[0];
        //return $clinic->id;
        return view('clinic.edit')->with('clinic',$clinic);

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
 $validator = Validator::make($request->all(),[
            // 'phone' => 'required|digits:11|numeric',
             'name' =>  'required|max:20|min:5',
             'address' => 'required',
             'description' => 'min:20|max:200',
             'phone' => 'numeric|digits:11',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        $clinicOwner = new ClinicOwner();
        $c =new Clinic();
        $name= $request->input('name');
        $address= $request->input('address');
        $description= $request->input('description');
        $phone= $request->input('phone');

        $c->Setname($name);
        $c->Setaddress($address);
        $c->Setdescription($description);
        $c->Setphone($phone);
        if ($clinicOwner->updateClinic($c,$id))
            return redirect('clinic');
        return "error";
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

        $clinicOwner = new ClinicOwner();
        if ($clinicOwner->deleteClinic($id))
            return redirect('clinic');
        return "error";
    }

    public function getEmps($id){
        Session::put('clinic_id', $id);
        $c=new Clinic();
        $emps = $c->getEmps($id);

        return view('employee.index')->with('emps',$emps)->with('cid',$id);
    }

      public function notifyAllView($id){
        return view('employee.notify')->with('cid',$id);
    }

    public function notifyAll(Request $request,$cid){
        $c = new Clinic();
        $emps = $c->getEmps($cid);
        $owner = new ClinicOwner();
        foreach ($emps as $emp) {
            $em = new Doctor();
            $em->Setid($emp->id);
            $owner->registerObserver($em);
        }
        $owner->notifyObservers($request->input('Title'),$request->input('description'));
        return redirect('clinic');
    }
    
}
