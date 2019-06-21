


@extends('home')

@section('content')
 
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/doctor/search') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="input-group">
                  <input type="email" class="form-control"name="search" value="{{ old('search') }}" placeholder="Search for...">
                   @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                        </span>
                  </div>
 
                    </form>
                


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>

  <!-- Table -->
  <table class="table">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Operations</td>
        </tr>
        <?php $i = 1; ?>
        @foreach ($docs as $doc)
        <tr>
            <td><?php echo $i++ ?></td>
            <td>{{ $doc->name }}</td>
            <td>
            
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/owner/employ') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('cid') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <select class="form-control" name="cid">
                                    @foreach ($cls as $cl)
                                        <option value="{{$cl->id.'**'.$cl->name}}">{{$cl->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('cid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notify') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <select class="form-control" name="notify">
                                    <option value="1">Notification</option>
                                    <option value="2">Email</option>
                                </select>

                                @if ($errors->has('cid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('did') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <input  class="form-control" style = "visibility:hidden;" name="did" value="{{ $doc->id }}">

                                @if ($errors->has('did'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('did') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Employ
                                </button>
                            </div>
                        </div>
                    </form></td>
        </tr>
        @endforeach
  </table>

</div>

@endsection
