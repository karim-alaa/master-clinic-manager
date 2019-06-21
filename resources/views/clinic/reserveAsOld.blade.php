@extends('home')

@section('content')


 

             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.reserveAppointment')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    

 @if($errors->any())
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{$errors->first('added')}}
  </div>
@endif

                    
                <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="post"  action="{{ url('reserve') }}">
                        {!! csrf_field() !!}


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.date')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" class="form-control min-date" placeholder="{{trans('system.date')}}" name="date" id="date" onchange="getDoctors({{Auth::id()}},document.getElementById('date').value)">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
 
      

                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.nationalityId')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.nationalityId')}}" name="nationality_id">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>

            <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.doctorName')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                       <select class="form-control" name="doctor_name" id='selectDoc'>
                      
                        </select>
                      </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="form-group">
                        <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-time"></span>  {{trans('system.reserve')}}</button>
                      </div>
                        </div>
                    </div>

   </form>
               
@endsection