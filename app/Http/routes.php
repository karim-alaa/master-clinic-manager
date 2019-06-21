<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



   //JustForTest

Route::group(['middleware' => 'web'], function () {

Route::get('/getRequest', function(){
    if(Request::ajax()){
        return 'Request has loaded successfuly !!';
    }
});

Route::post('/ragister','tryController@search');
/*Route::post('/ragister', function(){
    if(Request::ajax()){
        return Response::json(Request::all());
    }
});
*/
Route::resource('try/someThing', 'tryController@trySomeThing');

Route::post('executeSearch', array('uses'=>'tryController@executeSearch'));
 Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
   Route::resource('try', 'tryController');
   Route::resource('/reservation', 'ReservationController');
   Route::post('changeLang','HomeController@setLocalLang');
   Route::get('reservation/cansel/{id}','ReservationController@canselReservation');
   Route::post('reservation/update/{id}','ReservationController@updateReservation');
    //BasicAuth
    Route::auth();
    //FacebookAuth
    Route::get('/auth/facebook','facebookController@redirectToProvider');
    Route::get('/facebook-login-callback','facebookController@handeProviderCallback');
    //Home
    Route::get('/', 'HomeController@index');
    Route::get('/home', function(){return view('welcome');});
    //Clinic
    Route::get('clinic/emps/{id}', 'ClinicController@getEmps');
    Route::get('clinic/{id}/notifyAll', 'ClinicController@notifyAllView');
    Route::post('clinic/{id}/notifyAllp', 'ClinicController@notifyAll');
    //User
    Route::post('user/{id}/updateUserImage', 'UserController@updateUserImage');
    Route::post('user/{id}/changePassword', 'UserController@changePassword');
    Route::get('user/endTour', 'UserController@endTour');
    //Doctor
    Route::post('doctor/{id}/updateDoctor', 'DoctorController@updateDoctor');
    Route::post('doctor/{id}/updateDoctorImage', 'DoctorController@updateDoctorImage');
    Route::post('doctor/{id}/saveDoctorCV', 'DoctorController@saveDoctorCV');
    Route::get('doctor/{id}/downloadCV', 'DoctorController@downloadCV');
    Route::post('doctor/search', 'ClinicOwnerController@searchDoctor');
    Route::get('doctor/listDoctors', 'DoctorController@showAllDoctors');
    Route::get('doctor/{id}/confirmOffer', 'DoctorController@confirmOffer');
    Route::post('doctor/{offer_id}/acceptOffer', 'DoctorController@acceptOffer');
    Route::get('doctor/d/{id}/{date}', 'DoctorController@getDoctor');
    Route::get('doctor/myAppintment','DoctorController@myAppintment');
    Route::get('doctor/custom/PDMA','DoctorController@customPDMA');
    Route::get('doctor/edit/PDMA','DoctorController@editPDMA');
    Route::match(['get', 'post'],'doctor/clinic/edit/PDMA','DoctorController@editClinicPDMA');
    Route::post('doctor/store/PDMA','DoctorController@storePDMA');
    Route::post('doctor/myAppintmentByClinic','DoctorController@myAppintmentByClinic');
    //Nurse 
    Route::post('nurse/{id}/updateNurse', 'NurseController@updateNurse');
    Route::post('nurse/{id}/updateNurseImage', 'NurseController@updateNurseImage');
    Route::get('nurse/{id}/reserve/patient/new', 'NurseController@reserveNew');
    Route::get('nurse/{id}/reserve/patient/exist', 'NurseController@reserveOld');
    Route::get('nurse/timetable', 'NurseController@timetable');
    Route::get('nurse/reservations', 'NurseController@getReservations');
    Route::get('reservation/{day}/{doctor}', 'NurseController@filterReservations');
    //Patient
    Route::get('patient/examine/{reservation_id}', 'PatientController@examinePatient');
    //Owner
    Route::post('owner/{id}/updateOwner', 'ClinicOwnerController@updateOwner');
    Route::post('owner/{id}/updateOwnerImage', 'ClinicOwnerController@updateOwnerImage');
    Route::post('owner/employ', 'ClinicOwnerController@employ');
    Route::get('owner/reservation/history','ClinicOwnerController@showMyClinicHistory');
    Route::get('owner/patient-reservation/history/{patient_id}', 'ClinicOwnerController@getPatientHistory');
    Route::post('owner/showMyClinicHistory/ByClinic','ClinicOwnerController@showMyClinicHistoryByClinic');

    Route::post('emp/sack', 'ClinicOwnerController@sack');
    //Diagnosis
    Route::post('diagosis/writeDiagnosis/{reservation_id}','DiagnosisController@writeDiagnosis');
    Route::post('diagosis/addCustomPDMA','DiagnosisController@addCustomPDMA');
    //Offer
    Route::get('offer/{id}/addNewOffer', 'OfferController@addNewOffer');
    Route::get('offer/{id}/sendOffer', 'OfferController@sendOffer');
    Route::get('offer/{id}/listOffers', 'OfferController@listAllOffers');
    //resources
    Route::resource('ClinicOwner','ClinicOwnerController');
    Route::resource('clinic', 'ClinicController');
    Route::resource('offer', 'OfferController');
    Route::resource('nurse','NurseController');
    Route::resource('employee','EmployeeController');
    Route::resource('ClinicOwner','ClinicOwnerController');
    Route::resource('doctor','DoctorController');
    //help
    Route::get('/user/help/',function(){
          
            if(Auth::user()->role_id == 1)
               return view('help.nurse');
            if(Auth::user()->role_id == 2)
               return view('help.doctor');
            if(Auth::user()->role_id == 3)
               return view('help.owner');
    });
    //reserv
    Route::post('mohamed99','ReservationController@addpatient');
    Route::post('reserve','ReservationController@reserve');
    //report
    Route::get('clinic/report/{id}', 'ClinicOwnerController@report');
    //alert
    Route::get('user/removeMessagesAlert','UserController@removeMessagesAlert');
});






