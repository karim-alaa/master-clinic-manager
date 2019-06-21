<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
use App\Http\Requests;

class facebookController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handeProviderCallback(){
      try{
           $user = Socialite::driver('facebook')->user();
      }catch(Exception $e){

      }
           $data = ['name'=>$user->name,'email'=>$user->email,'password'=>$user->token,  'avatar' => $user->avatar, 'facebook_id' => $user->user['id']];
        $userDB = User::where('email',$user->email)->first();
        if(!is_null($userDB)){
            Auth::login($userDB);
        }
        else{
            Auth::login(User::create($data));
        }
        return redirect('/');
    }
}
