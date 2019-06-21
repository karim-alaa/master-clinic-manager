@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.listDoctor')}}</h2>
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


                  
                   <center>{!! $doctors->links() !!}</center>    
                       <br/>
<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>{{trans('system.name')}}</th>
                        <th>{{trans('system.mail')}}</th>
                        <th>{{trans('system.phone')}}</th>
                        <th>{{trans('system.address')}}</th>
                        <th>{{trans('system.age')}}</th>
                        <th>{{trans('system.specialization')}}</th>
                        <th>{{trans('system.cv')}}</th>

                        <th><em class="fa fa-cog"></em></th>
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>{{ $doctor->username }}</td>
                            <td>{{ $doctor->useremail }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->address }}</td>
                            <td>{{ $doctor->age }}</td>
                            <td>{{ $doctor->spname }}</td>
                       
                               <td>
 <?php if(!empty($doctor->doctorCv)) {  ?>
 <a href="{{ url('/doctor/'.$doctor->doctor_id.'/downloadCV') }}" class="btn btn-warning " ><span class="glyphicon glyphicon-save"></span> </a> 
  <?php
}else{
?>
 <a href="" data-toggle="modal" data-target="#cv" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> </a> 
<?php
}
?>
</td>
      

                                    <td>
                                  

          <a  href="{{ url('/offer/'.$doctor->doctor_id.'/addNewOffer') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> </a>
                                    

                                 </td>


                        
                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
<center>{!! $doctors->links() !!}</center> 
                </div>
              </div>

@endsection



<div class="modal fade" id="cv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Cannot Download</h4>
            </div>
            <div class="modal-body">
                <h4>Cannot Download This File, check fllowing reasons</h4>
                <span>1- Doctor Dosn't Have A CV (Common)</span><br>
                <span>2- File Have Been Deleted By Docotr</span><br>
                <span>3- Cannot Access The File In Invalid Format </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Thank You</button>
               
            </div>
        </div>
    </div>
</div>