@extends('home')
{!! Html::style('css/bootstrap.css') !!}
{!! Html::style('css/footer.css') !!}
{!! Html::style('css/profile.css') !!}
@section('content')

<div class="container">
    

  
<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
          {{ Html::image(Auth::user()->avatar,Auth::user()->name,array('width' => '30','height'=>'30','class'=>'img-circle')) }}
            
        </div><br/>
        <div class="card-info"> <span class="card-title">{{Auth::user()->name}}</span>
        <br/><span class="card-title">{{trans('system.doctor')}}/{{$doctor->spname}}</span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">{{trans('system.basic')}}</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">{{trans('system.lovley')}}</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">{{trans('system.advanced')}}</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
   
 {!! Form::open(array('method'=>'POST','url'=>'doctor/'.Auth::id().'/updateDoctor')) !!}
     <br/><br/> 
         {!! Form::label('email', trans('system.mail')) !!} 
           {!! Form::email('email',$doctor->useremail, array('class'=>'form-control')) !!}
             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
<br/><br/>

           {!! Form::label('name', trans('system.name')) !!} 
           {!! Form::text('name',$doctor->username, array('class'=>'form-control')) !!}
             @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

<br/><br/>
 
           {!! Form::label('phone', trans('system.phone')) !!} 
           {!! Form::number('phone',$doctor->phone, array('class'=>'form-control')) !!}
             @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

<br/><br/>
 
           {!! Form::label('age', trans('system.age')) !!} 
           {!! Form::text('age',$doctor->age, array('class'=>'form-control')) !!}
             @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif

<br/><br/>
 
           {!! Form::label('address', trans('system.address')) !!} 
           {!! Form::text('address',$doctor->address, array('class'=>'form-control')) !!}
             @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif

<br/><br/>
 
           {!! Form::label('nationality_id', trans('system.nationalityId')) !!} 
           {!! Form::number('nationality_id',$doctor->nation, array('class'=>'form-control')) !!}
             @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif

<br/><br/>

 {!! Form::label('address', trans('system.specialization')) !!} 
 <select class="form-control" name="sp_id">
   @foreach($sp as $sps)
 <option value="{{$sps->id}}"  <?php if($sps->name == $doctor->spname) echo "selected='true'";?> >{{$sps->name}}</option>
   @endforeach
  </select>


        

          <hr>
        {!! Form::submit(trans('system.save'), array('class'=>'btn btn-primary ')) !!}
        
        {!! Form::close() !!}

        </div>









        <div class="tab-pane fade in" id="tab2">
         <br/>
<h3>{{trans('system.currentImage')}}</h3> 
{{ Html::image(Auth::user()->avatar,Auth::user()->name,array('class'=>'img-responsive')) }}
<br/>
 
  {!! Form::open(array('method'=>'POST','url'=>'user/' . Auth::id() . '/updateUserImage', 'files'=>'true')) !!}
  <br/>

  <div class="fileUpload btn btn-primary">
    <span>{{trans('system.uploadNewImage')}}</span>
</div>
    <input id="uploadBtn" name="image" type="file" class="upload" />

<br/><br/>
  <div class="col-xs-4">
<input id="uploadFile" placeholder="Choose File" class="form-control" disabled="disabled" />
</div>

  @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif

 


<script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
<hr>








<br/><br/>
          <hr>
        {!! Form::submit(trans('system.save'), array('class'=>'btn btn-primary ')) !!}
        
        {!! Form::close() !!}


 


 <h4>Upload Your CV From Here, hint .. if you have already cv in site it will be lost</h4>
  {!! Form::open(array('method'=>'POST','url'=>'doctor/' . Auth::id() . '/saveDoctorCV', 'files'=>'true')) !!}


  <div class="fileUpload btn btn-primary">
    <span>{{trans('system.uploadNewCv')}}</span>
</div>
    <input id="cvuploadBtn" name="cv" type="file" class="upload" />

<br/><br/>
  <div class="col-xs-4">
<input id="cvuploadFile" placeholder="Choose File" class="form-control" disabled="disabled" />
</div>

  @if ($errors->has('cv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cv') }}</strong>
                                    </span>
                                @endif

 


<script type="text/javascript">
    document.getElementById("cvuploadBtn").onchange = function () {
    document.getElementById("cvuploadFile").value = this.value;
};
</script>
<hr>

<br/>

<?php 
if(!empty($oldcv)){?>

<a href="{{ url('/doctor/'.Auth::id().'/downloadCV') }}">Download Your Last CV</a> 
  <?php
}
?>

<br/><br/>


   {!! Form::submit(trans('system.save'), array('class'=>'btn btn-primary ')) !!}
        
        {!! Form::close() !!}



 


        </div>













        <div class="tab-pane fade in" id="tab3">
              <br/>




           {!! Form::open(array('method'=>'POST','url'=>'user/' . Auth::id(). '/changePassword')) !!}
     <br/><br/>
         {!! Form::label('oldpass', trans('system.oldPassword')) !!} <br/>
           {!! Form::password('oldpass', array('class'=>'form-control')) !!}
             @if ($errors->has('oldpass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
<br/><br/><br/><br/>
         {!! Form::label('newpass', trans('system.newPassword')) !!} <br/>
           {!! Form::password('newpass', array('class'=>'form-control')) !!}
             @if ($errors->has('newpass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpass') }}</strong>
                                    </span>
                                @endif
<br/><br/>
<br/>



          <hr>
        {!! Form::submit(trans('system.save'), array('class'=>'btn btn-primary ')) !!}
        
        {!! Form::close() !!}
           
           
 

        </div>







      </div>
    </div>
    
    </div>
            
    </div>
</div>

 
<script type="text/javascript">$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
</script>

    {!! Html::script('js/profile.js') !!}
@endsection