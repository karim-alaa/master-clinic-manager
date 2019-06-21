@extends('home')

@section('content')

<br/><br/>

             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.editClinic', ['clinicName' => $clinic->name])}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                     
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
 

    {{ Form::open(['action'=>['ClinicController@update',$clinic->id], 'class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'put']) }}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Clinic 
                           Name <span class="required">*</span>
                      </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"  value="{{ $clinic->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                       <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Clinic Address <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="address" value="{{ $clinic->address }}" placeholder="Clinic Address" required="required" name="address" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>


                       <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Clinic Description<span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea type="text" id="description"   placeholder="Clinic Description"   name="description" class="form-control col-md-7 col-xs-12" data-parsley-id="3898">{{ $clinic->description }}</textarea><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>


                       <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Clinic Phone <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="phone" value="{{ $clinic->phone }}" placeholder="Clinic Phone"  name="phone" class="form-control col-md-7 col-xs-12" data-parsley-id="3898"><ul class="parsley-errors-list" id="parsley-id-3898">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </ul>
                      </div>
                    </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Save Changes
                                </button>
                            </div>
                        </div>
                    </form>



                </div>

                </div>
                
 
@endsection













