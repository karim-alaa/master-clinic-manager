@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>list of all reservation history</h2>
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
 
            

                   <center>{!! $history->links() !!}</center>    
                       <br/>
                      
<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>#</th>
                         <th>doctor name</th>
                        <th>reservation date</th>
                        <th>specilization</th>
                        <th>analysis name</th>
                        <th>diseases name</th>
                        <th>medicines name</th>
                        <th>parades name</th>
                        
                   
               
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($history as $his)
                        <tr>
                             <td><?php echo $i++ ?></td>
                             <td>{{ $his->doctor_name }}</td>
                             <td>{{ $his->date }}</td>
                             <td>{{ $his->sp_name }}</td>
                             <td>{{ $his->analysis_name }}</td>
                             <td>{{ $his->diseases_name }}</td>
                             <td>{{ $his->medicines_name }}</td>
                             <td>{{ $his->parades_name }}</td>

                            
                      <td>  <a href="{{ url('owner/patient-reservation/history/'.$his->patient_id.'') }}" class="btn btn-warning " ><span class="glyphicon glyphicon-save"></span> </a> </td>
                         

 

                              
                        
                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
<center>{!! $history->links() !!}</center>

 
                </div>
              </div>

@endsection



