<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Hash;
use Image;
use Auth;
use Validator;

class UserController extends Controller
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
       // $user = User->SearchById($id);
     //   return view('users.profile')->with('user',$user);
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



      public function changePassword(Request $request,$id){
           $user = User::find($id);

    $validator = Validator::make($request->all(),[
             'oldpass' => 'required',
             'newpass' => 'required|min:6',
          ]);

        if ($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
             $oldPass = Input::get('oldpass');
             $newPassword = Input::get('newpass');
             $newPass = bcrypt($newPassword);
if (Hash::check($oldPass, $user->password)){
          
                
                $u = new User();
                //$newPass = bcrypt(Input::get('newpass'));
                
                $u->updatePass($newPass);
               

           }else{
            return redirect()->back()->with('OldPasswordError','this is not your real Password !!');
              // take a pic for auth
           }
        }
        return redirect()->back();
    }





    public function updateUserImage(Request $request,$id){
        $validator = Validator::make($request->all(),[
             'image' => 'required|mimes:jpeg,bmp,png|max:5000',
          ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

            ##Uploading image before saving in DB
        $image = Input::file('image');
       $user = new User();
       $user->updateImage($id,$image);
       }
      return redirect()->back()->with('image', $image);
    }


    public function endTour(){
        $user = new User();
        $user->endTour(Auth::id());
        return redirect()->back();
    }

   
        public function removeMessagesAlert(){
           $user = new User();
           $user->removeNewNotfiy(Auth::id(),"Message");
           return redirect()->back();
        }

}
