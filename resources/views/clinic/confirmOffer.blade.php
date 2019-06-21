@extends('home')
 {{Html::style('css/checkbox.css')}}
@section('content')
<div class="x_panel">
                <div class="x_title">
  
                  <h2>{{trans('titles.confirmOffer', ['clinicName' => $offer->clinicName])}}</h2>
                    
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
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{$errors->first('cannotAdd')}}
  </div>
@endif




                    <h5> <strong>{{trans('titles.confirmOfferBigNote')}} <small>{{trans('titles.confirmOfferSmallNote')}}</small></strong></h5>
                       <br/>

 
                              @if ($errors->has('checkarr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('checkarr') }}</strong>
                                    </span>
                                @endif
 


<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>{{trans('system.check')}}</th>
                        <th>{{trans('system.from')}}</th>
                        <th>{{trans('system.to')}}</th>
                        <th>{{trans('system.patientNumber')}}</th>
                        <th>{{trans('system.day')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                   <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('doctor/'.$offer->id.'/acceptOffer') }}">
                        {!! csrf_field() !!}

 

        <tr>
          <td><input type="checkbox" value="day1" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day1_from"     min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day1_from') }}"></input></td>
           <td><input name="day1_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day1_to') }}"></input></td>
           <td><input class="form-control col-lg-3" type="number" name="patient_num_1" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_1')}}" min="5" max="50"/></td>
           <td><span><font size="4">{{trans('days.saturday')}}</font></span></td> 
        </tr>  

         <tr>
         <td><input type="checkbox" value="day2"  name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day2_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day2_from') }}"></input></td>
           <td><input name="day2_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day2_to') }}"></input></td>
           <td><input class="form-control col-lg-3" type="number" name="patient_num_2" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_2')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.sunday')}}</font></span></td> 
        </tr>  

         <tr>
          <td><input type="checkbox" value="day3" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day3_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day3_from') }}"></input></td>
           <td><input name="day3_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day3_to') }}"></input></td>
            <td><input class="form-control col-lg-3" type="number" name="patient_num_3" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_3')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.monday')}}</font></span></td> 
        </tr>  

         <tr>
          <td><input type="checkbox" value="day4" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day4_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day4_from') }}"></input></td>
           <td><input name="day4_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day4_to') }}"></input></td>
            <td><input class="form-control col-lg-3" type="number" name="patient_num_4" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_4')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.tuesday')}}</font></span></td> 
        </tr>  

         <tr>
          <td><input type="checkbox" value="day5" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day5_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day5_from') }}"></input></td>
           <td><input name="day5_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day5_to') }}"></input></td>
            <td><input class="form-control col-lg-3" type="number" name="patient_num_5" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_5')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.wednesday')}}</font></span></td> 
        </tr>  

         <tr>
          <td><input type="checkbox" value="day6" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day6_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day6_from') }}"></input></td>
           <td><input name="day6_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day6_to') }}"></input></td>
            <td><input class="form-control col-lg-3" type="number" name="patient_num_6" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_6')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.thursday')}}</font></span></td> 
        </tr>  

         <tr>
          <td><input type="checkbox" value="day7" name="checkarr[]" onchange="open" class="form-control"/></td>
           <td><input name="day7_from"   min="1" max="12" type="number" placeholder="{{trans('system.from')}}" class="form-control col-lg-3  "  value="{{ old('day7_from') }}"></input></td>
           <td><input name="day7_to"     min="1" max="12" type="number" placeholder="{{trans('system.to')}}" class="form-control col-lg-3 "  value="{{ old('day7_to') }}"></input></td>
            <td><input class="form-control col-lg-3" type="number" name="patient_num_7" placeholder="{{trans('system.patientNumber')}}" value="{{old('patient_num_7')}}" min="5" max="50"/></td> 
           <td><span><font size="4">{{trans('days.friday')}}</font></span></td> 
        </tr>  

         
                    </tbody>
                  </table>
 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md">
                   <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span>  {{trans('system.confirmOffer')}} </button>

                      </div>
                    </div>

                  </form>
                </div>
              </div>

             
                       
                       
                  

@endsection
