@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.addClinic')}}</h2>
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


                         <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('clinic') }}">
                        {!! csrf_field() !!}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{trans('system.clinicName')}}<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" value="{{ old('name') }}" placeholder="{{trans('system.clinicName')}}" required="required" name="name" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>



                       <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">{{trans('system.clinicAddress')}}<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="address" value="{{ old('address') }}" placeholder="{{trans('system.clinicAddress')}}" required="required" name="address" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>


                       <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{trans('system.clinicDescription')}}<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea type="text" id="description" value="{{ old('description') }}" placeholder="{{trans('system.clinicDescription')}}"   name="description" class="form-control col-md-7 col-xs-12" data-parsley-id="3898">{{ old('description') }}</textarea><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>


                       <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">{{trans('system.clinicPhone')}} <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="phone" value="{{ old('phone') }}" placeholder="{{trans('system.clinicPhone')}}"  name="phone" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> {{trans('system.add')}}</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>

@endsection
