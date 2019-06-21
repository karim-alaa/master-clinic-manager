@extends('layouts.app')

@section('content')

 <div>
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
            <h1>{{trans('system.loginForm')}}</h1>
            <div>
              <input type="email" class="form-control"  placeholder="{{trans('system.mail')}}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:white;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                
            </div>
            <div>
             <input type="password" placeholder="{{trans('system.password')}}" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:white;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>

               <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{trans('system.rememberMe')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        
            <div>
               <button type="submit" class="btn btn-default">
             {{trans('system.login')}}
                 </button>
              <a class="reset_pass" href="{{ url('/password/reset') }}">{{trans('system.forgetPassword')}}?</a>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">{{trans('system.areYouNew')}}?
                <a href="./register"> {{trans('system.createAccount')}}</a>
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
      </div>
    
    </div>
  </div>


@endsection
