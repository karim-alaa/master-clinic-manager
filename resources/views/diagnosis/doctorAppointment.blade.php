@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('system.todayAppointment')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                
                  <br>

 @if($errors->any())
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{$errors->first('added')}}
  </div>
@endif



                  
                     <form method="post" action="{{url('doctor/myAppintmentByClinic')}}" >
                      {!! csrf_field() !!}
                      <select name="clinic" class="form-control">
                      @foreach ($myClinic as $clinics)
                      @if($clinics->id == session('doctor_clinic_id'))
                      <option value="{{$clinics->id}}" selected="true">{{$clinics->name}}</option>
                      @endif
                      @if($clinics->id != session('doctor_clinic_id'))
                        <option value="{{$clinics->id}}">{{$clinics->name}}</option>
                        @endif
                      @endforeach
                    </select>
                    <br/>
                     <button type="submit" id="btn-submit" class="btn btn-primary">{{trans('system.MyAppointment')}}</button>
                    </form>
                    <hr/>
                  
                   <center>{!! $Appointment->links() !!}</center>    
                       <br/>
                       @if(count($Appointment) != null)
<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>{{trans('system.check')}}</th>
                        <th>{{trans('system.patientName')}}</th>
                        <th>{{trans('system.examination')}}</th>
                        <th>{{trans('system.patientFile')}}</th>
                        <th><em class="fa fa-cog"></em></th>
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($Appointment as $Appointments)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>{{ $Appointments->patientName }}</td>
  <td>
<?php     if( $Appointments->examination == 1) 
       echo trans('system.yes');
       else
        echo trans('system.no');
  ?>

                         </td>
                        
                                                   <td>  <a href="{{ url('owner/patient-reservation/history/'.$Appointments->patient_id.'') }}" class="btn btn-success " ><span class="glyphicon glyphicon-file"></span> </a> </td>     
                           

                                    <td>
 
 

  <a href="{{url('/patient/examine/'.$Appointments->id.'')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="{{trans('system.writeDiagnosis')}}"><span class="glyphicon glyphicon-plus"></span> </a>
  
 
                                 </td>


                              
                        
                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
<center>{!! $Appointment->links() !!}</center>

@else
<h2>{{trans('system.noPatientToday')}}<h2>
@endif 
                </div>
              </div>

@endsection



