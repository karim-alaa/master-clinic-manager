
@extends('home')

@section('content')
 
 
 



  <!-- Default panel contents -->
  <br><br>
 

             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.myClinic')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                     </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


 @if($errors->any())
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     {{$errors->first('added')}}
  </div>
@endif

 

                
@if(!empty($clinics))
                 <table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>{{trans('system.name')}}</th>
                        <th>{{trans('system.phone')}}</th>
                        <th>{{trans('system.address')}}</th>
                        <th>{{trans('system.about')}}</th>

                        <th><em class="fa fa-cog"></em></th>
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($clinics as $clinic)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>{{ $clinic->name }}</td>
                            <td>{{ $clinic->phone }}</td>
                            <td>{{ $clinic->address }}</td>
                            <td>{{str_limit($clinic->description , $limit = 35, $end = '...')
                             }}</td>
                                
                                    <td>
  {{ Form::open(['action'=>['ClinicController@destroy',$clinic->id],
    'class'=>'form-horizontal' ,'role'=>'form','method'=>'DELETE', 'id'=>'delete']) }}
                                    
                                        {!! csrf_field() !!}



          <a  href="{{ url('clinic/emps/'.$clinic->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> </a>
                                     <a class="btn btn-default" href="{{ url('clinic/' . $clinic->id . '/edit') }}"><em class="fa fa-pencil"></em></a>



                                 <button data-toggle="confirmation" type="submit" data-toggle="confirmation" data-placement="left"  id="delete" class="btn btn-danger"><em class="fa fa-trash"></em></button>

 



  <a  href="{{ url('clinic/report/'.$clinic->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-file"></span> </a>        

                                 </td>
                        
                              </form>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
@else
<h2>{{trans('titles.noClinic')}}</h2>
@endif
                </div>
  
            
@endsection


 