<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Doctor;
use Auth;
use App\Http\Requests;

class PatientController extends Controller
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

    public function examinePatient($id){
        $doctor = new Doctor();
        $clinic_id = session('doctor_clinic_id');
        $Appointment = $doctor->getReservationData($id)[0];
        $parades = $doctor->getParades($clinic_id,Auth::id());
        $medicines = $doctor->getMedicines($clinic_id,Auth::id());
        $diseases = $doctor->getDiseases($clinic_id,Auth::id());
        $analysis = $doctor->getAnalysis($clinic_id,Auth::id());
        if($Appointment && $parades && $medicines && $diseases && $analysis)
            return view('diagnosis.examinePatient')
                    ->with('Appointment', $Appointment)
                    ->with('parades', $parades)
                    ->with('medicines', $medicines)
                    ->with('diseases', $diseases)
                    ->with('analysis', $analysis);

        else
            return view('errors.503');
    }

}
