<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Employee;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:15',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:6',
            'nationality_id' =>'required|numeric|digits:14|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {


       $digits = 11;
       $default_avatar = "";
       $default_man_avatar = "image\users\default-man_avatar.jpg";
       $default_woman_avatar = "image\users\default-woman_avatar.jpg";

       if($data['gender'] == '1'){
          $default_avatar =  $default_man_avatar;
       }else if ($data['gender'] == '2') {
           $default_avatar =  $default_woman_avatar;
       }


        
 
            return User::create
            ([
                'name'           =>   $data['name'],
                'nationality_id' =>   $data['nationality_id'],
                'role_id'        =>   $data['role_id'],
                'is_male'        =>   $data['gender'],
                'email'          =>   $data['email'],
                'is_active'      =>   1,
                'email'          =>   $data['email'],
                'password'       =>   bcrypt($data['password']),
                'avatar'         =>   $default_avatar,
            ]);
    }
}
