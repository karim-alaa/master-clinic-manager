@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('system.listHistory')}}</h2>
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
  <form method="post" action="{{url('owner/showMyClinicHistory/ByClinic')}}" >
                      {!! csrf_field() !!}
                   <select name="clinic" class="form-control">
                      @foreach ($myClinic as $clinics)
                      @if($clinics->id == session('owner_history_clinic_id'))
                      <option value="{{$clinics->id}}" selected="true">{{$clinics->name}}</option>
                      @endif
                      @if($clinics->id != session('owner_history_clinic_id'))
                        <option value="{{$clinics->id}}">{{$clinics->name}}</option>
                        @endif
                      @endforeach
                    </select>
  <br/>
                     <button data-toggle="confirmation" type="submit" id="btn-submit" class="btn btn-primary">{{trans('system.MyAppointment')}}</button>
                    </form>
                    <hr/>

                   <center>{!! $history->links() !!}</center>    
                       <br/>
                       @if(count($history) != null)
<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>{{trans('system.patientName')}}</th>
                        <th>{{trans('system.date')}}</th>
                        <th>{{trans('system.specilization')}}</th>
                        <th>{{trans('system.doctorName')}}</th>
                        <th>{{trans('system.patientFile')}}</th>
                   
               
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($history as $his)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>{{ $his->patient_name }}</td>
                            <td>{{ $his->date }}</td>
                             <td>{{ $his->sp_name }}</td>
                            <td>{{ $his->doctor_name }}</td>
                            

                            
                      <td>  <a href="{{ url('owner/patient-reservation/history/'.$his->patient_id.'') }}" class="btn btn-warning " ><span class="glyphicon glyphicon-save"></span> </a> </td>
                         

 

                              
                        
                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
<center>{!! $history->links() !!}</center>

@else
<h2>{{trans('titles.noHistory')}}<h2>
@endif 
                </div>
              </div>

@endsection



