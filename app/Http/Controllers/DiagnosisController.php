<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Doctor;
use Auth;
use App\Http\Requests;

class DiagnosisController extends Controller
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
        //
    }



    public function writeDiagnosis(Request $request, $id){

          $validator = Validator::make($request->all(),[
             'parades' =>  'required',
             'diseases' => 'required',
             'medicines' =>'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
             $parades = $request->input('parades');
             $diseases = $request->input('diseases');
             $medicines = $request->input('medicines');
             $analysis = $request->input('analysis');
                $doctor = new Doctor();
                if($doctor->writeDiagnosis($parades,$diseases,$medicines,$analysis,$id))
            return redirect('doctor/myAppintment')->withErrors(array('added'=> trans('alerts.addData') ));
                else
                    return view('errors.503');
       }
   }

 
        
}
