@extends('home')

@section('content')

 
 

             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.addPatient')}}</h2>
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


                    
  <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('mohamed99') }}">
                        {!! csrf_field() !!}

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.name')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.name')}}" value="{{ old('name') }}"  name="name">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
                
                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.mail')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.mail')}}" value="{{ old('email') }}"  name="email">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
      
                 <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.password')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" class="form-control" placeholder="{{trans('system.password')}}" value="{{ old('password') }}"   name="password">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.confirmPassword')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" value="{{ old('copass') }}"  class="form-control" placeholder="{{trans('system.confirmPassword')}}" name="copass">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('copass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('copass') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.address')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.address')}}" value="{{ old('address') }}"  name="address">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
                    
                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.phone')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.phone')}}" value="{{ old('phone') }}"  name="phone">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
      
            
                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.age')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.age')}}" value="{{ old('age') }}"  name="age">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
      
      
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('system.nationalityId')}}</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="{{trans('system.nationalityId')}}" value="{{ old('nationality_id') }}"  name="nationality_id">
                        <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>
       <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
  <div class="form-group{{ $errors->has('is_male') ? ' has-error' : '' }}">

              <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default parsley-success active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="1" data-parsley-multiple="gender" data-parsley-id="2930"> &nbsp; {{trans('system.male')}} &nbsp;
                          </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                          <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="2" checked="" data-parsley-multiple="gender" data-parsley-id="2930"> {{trans('system.female')}}
                          </label>
                        </div>
</div>
      </div>
      <br/>
<hr/>
                    <div class="ln_solid"></div>

                    <div class="form-group">
                        <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> {{trans('system.add')}}</button>
                      </div>
                        </div>
                    </div>

   </form>
              
@endsection