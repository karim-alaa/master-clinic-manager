@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.addOffer')}}</h2>
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
                         <form id="demo-form2" class="form-horizontal form-label-left" role="form" method="GET" action="{{ url('offer/'.$doctor_id.'/sendOffer') }}">
                        {!! csrf_field() !!}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Offer_name">{{trans('system.offerName')}} <span class="required"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" placeholder="{{trans('system.offerName')}}" id="Offer_name" value="{{ old('name') }}"  required="required" name="name" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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


                       
              


                            <div class="form-group{{ $errors->has('clinic_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{trans('system.clinicForOffer')}}<span class="required"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="clinic_id">
   @foreach($clinics as $clinic)
 <option value="{{$clinic->id}}"  >{{$clinic->name}}</option>
   @endforeach
  </select>

                          <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('clinic_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clinic_id') }}</strong>
                                    </span>
                                @endif
                        </ul>
              </div>
 </div>


                     <div class="form-group{{ $errors->has('method') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="method">{{trans('system.methodToAlert')}} <span class="required"> *</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="method">
                              <option value="1"  >{{trans('system.notification')}}</option>
                              <option value="2"  >{{trans('system.emailAlert')}}</option>
                            </select>

                          <ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('method'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('method') }}</strong>
                                    </span>
                                @endif
                          </ul>
              </div>
 </div



                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> {{trans('system.sendOffer')}} </button>

                      </div>
                    </div>

                  </form>
                </div>
              </div>

@endsection
