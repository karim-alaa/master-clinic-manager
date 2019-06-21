@extends('home')
 
@section('content')
  <!--CSS For Tags-->
  {{Html::style('css/tags/normalize.css')}}
  {{Html::style('css/tags/stylesheet.css')}}
  {{Html::style('css/tags/selectize.css')}}
  <!--JS For Tags-->
  {{Html::script('js/tags/index.js')}}

  {{Html::script('js/tags/selectize.js')}}

<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('system.examnationRoom')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form method="post" action="{{url('diagosis/writeDiagnosis/'.$Appointment->id.'')}}" >
                          {!! csrf_field() !!}

        <h4>{{trans('system.parades')}}</h4>
 

					<select id="parades" name="parades[]" multiple class="demo-default" style="width:50%" placeholder="Select ">
					@foreach($parades as $parade)
						<option value="{{$parade->id}}">{{$parade->name}}</option>
					@endforeach				 
					</select>
			 
				<script>
				$('#parades').selectize({
					maxItems: 15
				});
				</script>
				      @if ($errors->has('parades'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parades') }}</strong>
                                    </span>
                                @endif
		 
       <h4>{{trans('system.diseases')}}</h4>
 	<select id="diseases" name="diseases[]" multiple class="demo-default" style="width:50%" placeholder="Select ">
					@foreach($diseases as $disease)
						<option value="{{$disease->id}}">{{$disease->name}}</option>
					@endforeach				 
					</select>
			 
				<script>
				$('#diseases').selectize({
					maxItems: 15
				});
				</script>
				      @if ($errors->has('diseases'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('diseases') }}</strong>
                                    </span>
                                @endif

                
				  <h4>{{trans('system.medicines')}}</h4>
	<select id="medicines" name="medicines[]" multiple class="demo-default" style="width:50%" placeholder="Select ">
					@foreach($medicines as $medicine)
						<option value="{{$medicine->id}}">{{$medicine->name}}</option>
					@endforeach				 
					</select>
			 
				<script>
				$('#medicines').selectize({
					maxItems: 15
				});
				</script>
				      @if ($errors->has('medicines'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medicines') }}</strong>
                                    </span>
                                @endif
				

 <h4>{{trans('system.analysis')}}</h4>
	<select id="analysis" name="analysis[]" multiple class="demo-default" style="width:50%" placeholder="Select ">
					@foreach($analysis as $analysi)
						<option value="{{$analysi->id}}">{{$analysi->name}}</option>
					@endforeach				 
					</select>
			 
				<script>
				$('#analysis').selectize({
					maxItems: 15
				});
				</script>
				      @if ($errors->has('analysis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('analysis') }}</strong>
                                    </span>
                                @endif

                <hr/>
                <button type="submit" id="btn-submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>  {{trans('system.save')}}</button>
                </div>
              </div>


      </form>


 
@endsection


 
 