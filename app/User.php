<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;
use Image;

class User extends Authenticatable
{

    private $id;
    private $username;
    private $nationality_id;
    private $address;
    private $age;
    private $phone;
    private $avatar_org;
    public  $alert;


   

        public function Setid($id)
    {
      
      $this->id = $id;

    }

    public function Getid()
    {

        return $this->id;
    }


        public function Setusername($username)
    {
      
      $this->username = $username;

    }

    public function Getusername()
    {

        return $this->username;
    }


        public function Setnationality_id($nationality_id)
    {
      
      $this->nationality_id = $nationality_id;

    }

    public function Getnationality_id()
    {

        return $this->nationality_id;
    }


        public function Setaddress($address)
    {
      
      $this->address = $address;

    }

    public function Getaddress()
    {

        return $this->address;
    }


        public function Setage($age)
    {
      
      $this->age = $age;

    }

    public function Getage()
    {

        return $this->age;
    }


        public function Setphone($phone)
    {
      
      $this->phone = $phone;

    }

    public function Getphone()
    {

        return $this->phone;
    }


        public function Setavatar_org($avatar_org)
    {
      
      $this->avatar_org = $avatar_org;

    }

    public function Getavatar_org()
    {

        return $this->avatar_org;
    }


        /*    public function Setalert($alert)
    {
      
      $this->alert = $alert;

    }

    public function Getalert()
    {

        return $this->alert;
    }*/

   // Form::select('1', Config::get('enums.role'));

    public function setNotificationMethod($alert){
        $this->alert = $alert;
    }

    public function notify($id,$msg){
        
        return $this->alert->Send($id,$msg);
    }

    public function SearchById(){
         
    }

    public function SearchByName(){
        
    }


    public function UpdateProfile(){
        
    }

    public function UpdatePass($pass){
           
        DB::table('users')
                   ->where('id', Auth::id())
                   ->update(['password' => $pass]);
    }



    public function updateImage($id,$image){
        $user = User::find($id);
         $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$user->name;
        $path = 'image/users/';

       $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
         $user->avatar = $path.$filename;
         $user->save();
    }


 
     
      public function removeNewNotfiy($observer_id, $about){
         DB::table('notifications')
               ->where('observer_id', $observer_id)
              // ->where('about', $about)
               ->update(['new'=>'0',
                    ]);
               return true;
      }
         

      public function endTour($id){
          DB::table('users')
           ->where('id', $id)
           ->update(['is_new'=>'0',
                ]);
           return true;
      }

      


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'name', 'nationality_id','role_id','is_male','is_active','email','password','avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    //public $timestamps = false;
    protected $hidden = [
       // 'password', 
    'remember_token',
    ];
}
