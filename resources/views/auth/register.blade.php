@extends('layouts.app')

@section('content')

        <section class="login_content">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {!! csrf_field() !!}

            <h1>{{trans('system.createAccount')}}</h1>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="{{trans('system.name')}}" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <input type="email" class="form-control" placeholder="{{trans('system.mail')}}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <input type="password" placeholder="{{trans('system.password')}}" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
              
              
            <div  class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
               <input type="password" class="form-control" placeholder="{{trans('system.confirmPassword')}}" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
            </div>
              
              
            <div class="form-group{{ $errors->has('nationality_id') ? ' has-error' : '' }}">
                <input type="number" placeholder="{{trans('system.nationalityId')}}" class="form-control" name="nationality_id" value="{{ old('nationality_id') }}">

                                @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif
                           
             </div>
              
              
              
              <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
             <select class="form-control" name="role_id">
                                      <option value="3">{{trans('system.clinicOwner')}}</option>
                                      <option value="2">{{trans('system.doctor')}}</option>
                                      <option value="4">{{trans('system.patient')}}</option>
                                </select>

                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
              </div>
                            <div class="form-group{{ $errors->has('is_male') ? ' has-error' : '' }}">

              <div id="gender" class="btn-group" data-toggle="buttons">
                          <label class="btn btn-default parsley-success active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="1" data-parsley-multiple="gender" data-parsley-id="2930"> &nbsp;  {{trans('system.male')}} &nbsp;
                          </label><ul class="parsley-errors-list" id="parsley-id-multiple-gender"></ul>
                          <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="gender" value="2" checked="" data-parsley-multiple="gender" data-parsley-id="2930">  {{trans('system.female')}}
                          </label>
                        </div>
</div>


              
                 <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                   {{trans('system.register')}}
                                </button>
                        </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">{{trans('system.alreadyMember')}}?
                <a href="./login" >{{trans('system.login')}} </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-heartbeat" style="font-size: 26px;"></i> {{trans('system.clinicSystem')}}</h1>

                <p>{{trans('system.copyRights')}}</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
@endsection
