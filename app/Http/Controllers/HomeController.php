<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Notify;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $n = new Notify();

        //var_dump($n->getMyNotifications());
        Session::put('not', $n->getMyNotifications());
        
        if(Auth::user()->role_id == 3)
            return redirect('/clinic');
      
        else if(Auth::user()->role_id == 1){
            return redirect('nurse/'.Auth::id().'/reserve/patient/new');

           
        }
            
          else if(Auth::user()->role_id == 2){
         $result = DB::table('doctors')->where('doctor_id','=',Auth::id())->get();
         if($result){
           // do no thing
         }else{
                DB::table('doctors')->insert([
                      ['doctor_id' => Auth::id(), 'specialization_id'=> '1', 'is_active'=>'1']
                 ]);
          
        }
 
         return redirect('doctor/'.Auth::id().'/edit');
         }
        }


    }