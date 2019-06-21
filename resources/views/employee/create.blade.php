@extends('home')

@section('content')
 
 



<br/><br/>


             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.addNurse')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                     </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
 
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/nurse') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.name')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.mail')}}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.password')}}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.confirmPassword')}}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.nationalityId')}}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="nationality_id" value="{{ old('nationality_id') }}">

                                @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.position')}}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role_id">
                                      <option value="1">{{trans('system.nurse')}}</option>
                                </select>

                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('is_male') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.gender')}}</label>
                                 <div class="col-md-6">
                                             <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-primary active">
                                    <input type="radio" name="gender" value="1" id="option1" autocomplete="off" checked> {{trans('system.male')}}
                                  </label>
                                  <label class="btn btn-primary">
                                    <input type="radio" name="gender" value="2" id="option2" autocomplete="off"> {{trans('system.female')}}
                                  </label>
                                  
                                             </div>
                                </div>
                        </div>
                    <hr/>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span> 
                                    {{trans('system.add')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>    
         </div>    
    </div>

 @endsection