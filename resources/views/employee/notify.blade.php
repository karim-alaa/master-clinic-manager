@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.addNotify')}}</h2>
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
                         <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('clinic/'.$cid.'/notifyAllp') }}">
                        {!! csrf_field() !!}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">{{trans('system.title')}} <span class="required"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" placeholder="Title" id="Title" value=""  required="required" name="Title" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('Title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Title') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>



                       <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{trans('system.description')}}<span class="required"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea type="text" placeholder="{{trans('system.description')}}" id="description" value="{{ old('description') }}"  required="required" name="description" class="form-control col-md-7 col-xs-12" data-parsley-id="3898">{{ old('description') }}</textarea><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Send </button>

                      </div>
                    </div>

                  </form>
                </div>
              </div>

@endsection
