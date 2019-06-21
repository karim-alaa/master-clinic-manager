@extends('home')

@section('content')

<br/><br/><br/><br/>
 

             <div class="x_panel">
             
                <div class="x_title">
                  <h2>{{trans('titles.listReservation')}}</h2>
                  <div class="clearfix"></div>
                        <div class="contanier">
                     <div class="row">
                           
                                  
                       <div class="col-sm-3 col-xs-12">
                        <input type="date" class="form-control min-date" placeholder="Date" name="date" id="date" onchange="getDoctors({{Auth::id()}},document.getElementById('date').value)">
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-xs-12">
                        <select class="form-control" name="DoctorId" id="selectDoc">
                       
                 
                         
                        </select>
                      </div>    
                      <div class="col-sm-3 col-xs-12">
                          <button class="btn btn-primary" type="submit" onclick="getreservations(document.getElementById('date').value,document.getElementById('selectDoc').value)">
                          <span class="glyphicon glyphicon-search"></span> 
                          {{trans('system.find')}}</font></button>
                      </div>

                    </div>
                     </div>
</div>
                </div>
                <div class="x_content">
                     
                 <div class="panel panel-default">
                  <!-- Default panel contents -->
                     <div class="panel-heading">{{trans('titles.searchResult')}}</div>

                  <!-- Table -->
                     <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>{{trans('system.patientName')}}</th>
                          <th>{{trans('system.nationalityId')}}</th>
                          <th>{{trans('system.ticketNumber')}}</th>
                          <th>{{trans('system.isExamination')}}</th>
                          <th>{{trans('system.date')}}</th>

                          <th><em class="glyphicon glyphicon-pencil"></em></th>
                          <th><em class="glyphicon glyphicon-trash"></em></th>
                        </tr>
                      </thead>
                      <tbody id="tb">
                        @if (count($reservedata) > 0)
                          @foreach ($reservedata as $res)
                            <tr>
                            <?php $i = 0 ; $i++ ?>
                              <td><?php $i ?></td>
                              <td>{{$res->name}}</td>                
                              <td>{{$res->nationality_id}}</td>                
                              <td>{{$res->tecket_num}}</td>                
                              <td>{{$res->is_examination}}</td>                
                              <td>{{$res->date}}</td>                
                              
<td><a href="{{url('/reservation/'.$res->id.'/edit')}}"><button class="btn btn-default"><em class="glyphicon glyphicon-pencil"></em></button></td></a>



<td><a href="{{url('/reservation/cansel/'.$res->id.'')}}"><button class="btn btn-danger"><em class="glyphicon glyphicon-trash"></em></button></td> </a>                              

                      
                                
                        
                                
                            </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan = '8'>{{trans('titles.noAppointment')}}</td>
                          </tr>
                        @endif
                      
                      </tbody>
                     </table>
                    </div>

       
@endsection




 