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
                  <h2>{{trans('system.editPDMA')}}</h2>
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



 @if($errors->any())
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{$errors->first('added')}}
  </div>
@endif






                	
                     <form method="post" action="{{url('doctor/clinic/edit/PDMA')}}" >
                      {!! csrf_field() !!}
                      <select name="clinic" class="form-control">
                      @foreach ($myClinic as $clinics)
                      @if($clinics->id == session('doctor_editPDMA_clinic_id'))
                      <option value="{{$clinics->id}}" selected="true">{{$clinics->name}}</option>
                      @endif
                      @if($clinics->id != session('doctor_editPDMA_clinic_id'))
                        <option value="{{$clinics->id}}">{{$clinics->name}}</option>
                        @endif
                      @endforeach
                    </select>
                    <br/>
                     <button type="submit" id="btn-submit" class="btn btn-primary">{{trans('system.getPDMA')}}</button>
                    </form>
                    <hr/>




                <form method="post" action="{{url('doctor/store/PDMA')}}" >
                          {!! csrf_field() !!}
 

                <h4>{{trans('system.parades')}}</h4>
 
  
				 <input type="text" name="parades[]" id="parades" class="demo-default" value="{{$parades}}">
 

			       
			<script>
				$('#parades').selectize({
					delimiter: ',',
					persist: false,
					create: function(input) {
						return {
							value: input,
							text: input
						}
					}
				});
				</script> 

				  
		         <h4>{{trans('system.diseases')}}</h4>
                 
 	         <input type="text"  name="diseases[]" id="diseases" class="demo-default" value="{{$diseases}}">
			 
				<script>
				$('#diseases').selectize({
					delimiter: ',',
					persist: false,
					create: function(input) {
						return {
							value: input,
							text: input
						}
					}
				});
				</script> 

				 

                <h4>{{trans('system.medicines')}}</h4>
			 
                 <input type="text" name="medicines[]" id="medicines" class="demo-default" value="{{$medicines}}">
				<script>
				$('#medicines').selectize({
					delimiter: ',',
					persist: false,
					create: function(input) {
						return {
							value: input,
							text: input
						}
					}
				});
				</script> 

				 
				

 <h4>{{trans('system.analysis')}}</h4>
				 
	         <input type="text" name="analysis[]" id="analysis" class="demo-default" value="{{$analysis}}">
			 
			<script>
				$('#analysis').selectize({
					delimiter: ',',
					persist: false,
					create: function(input) {
						return {
							value: input,
							text: input
						}
					}
				});
				</script> 

		 

                <hr/>
                <button type="submit" id="btn-submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>  {{trans('system.save')}}</button>
                </div>
              </div>

 
 
@endsection


 
 