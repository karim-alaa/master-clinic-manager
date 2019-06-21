 
@extends('home')

@section('content')
<a href="{{ url('nurse/create') }}">{{trans('system.addNurse')}}</a><br/>
<a href="{{ url('clinic/'.$cid.'/notifyAll') }}">{{trans('system.notifyAll')}}</a><br/>

                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/doctor/search') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('system.mail')}}</label>

                            <div class="input-group">
                  <input type="email" class="form-control"name="search" value="{{ old('search') }}" placeholder="{{trans('system.search')}}..">
                   @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">{{trans('system.search')}}</button>
                        </span>
                  </div>
 
                    </form>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">{{trans('titles.manageClinic')}}</div>

  <!-- Table -->
  <table class="table">
        <tr>
            <td>#</td>
            <td>{{trans('system.name')}}</td>
            <td>{{trans('system.role')}}</td>
 
            <td><th><em class="fa fa-cog"></em></th></td>
        </tr>
        <?php $i = 1; ?>
        @foreach ($emps as $emp)
        <tr>
            <td><?php echo $i++ ?></td>
            <td> {{ $emp->name }}</td>
            <td> {{ $emp->role}}</td>
       
            <td>
            
                   
 <form class="form-horizontal" role="form" method="POST" action="{{ url('/emp/sack') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input  class="form-control" style = "visibility:hidden;" name="eid" value="{{ $emp->id }}">

                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eid') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                       <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input  class="form-control" style = "visibility:hidden;" name="cid" value="{{ $cid }}">

                                @if ($errors->has('cid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cid') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                       
                      

                      
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> {{trans('system.sack')}}
                                </button>
                         
                    </form>
                 
            </td>
        </tr>
        @endforeach
  </table>

</div>

@endsection
