<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;
use App\Http\Requests;
use App;
use App\User;
 
use Session;
use Illuminate\Support\Facades\Input;

class tryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     /*  App::setLocale('en');
        $tr = new TranslateClient('en', 'ar');
        $ka = $tr->translate('why');*/
     //   return date("D");
          return view('try.index')->with('ka',$ka)->with('lang','langs');
    }

    public function trySomeThing(Request $request){
       $parades = $request->input('parades');
       $paradesArray = explode(',', $parades);
    $string = "";
    foreach ($paradesArray as $parade) {
        $string .= $parade.' / ';
    }
       return $string;
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

    public function setLocalLang(Request $request){
      //  return $request->input('lang');
         App::setlocale($request->input('lang'));
        return redirect('try')->with('lang',$request->input('lang'));
    }


    public function executeSearch(){
        $keywords = Input::get('keywords');
         $cars = array("Volvo", "BMW", "Toyota");
         return view('try.index')->with('cars',$cars);
    }


    public function search(Request $request){
          $lname = $request->input('oprtion');
         // $fname = $request->input('firstname');
          $arr = [$lname];
          return json_encode($arr);
    }
}
