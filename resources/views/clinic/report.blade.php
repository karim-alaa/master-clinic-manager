@extends('home')

@section('content')

<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        
                        <th>#</th>
                        <th>Number of Clinics</th>
                        <th>Number of Nurses</th>
                        <th>Number of Doctors</th>
                        <th>Number of Reservations Today</th>
                        <th>Number of Reservations</th>
                        

                        
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        
                        <tr>

                            <td><?php echo $i++ ?></td>
                             @if(!empty($clinic))
                            <td>{{$clinic}}</td>
                           @else
                            <td>{{trans('system.no')}}</td>
                            @endif
                            @if(!empty($nurse))
                            <td>{{$nurse}}</td>
                           @else
                            <td>{{trans('system.no')}}</td>
                            @endif
                            @if(!empty($result))
                            <td>{{$result}}</td>
                           @else
                            <td>{{trans('system.no')}}</td>
                            @endif

                             @if(!empty($todat_reserve))
                            <td>{{$todat_reserve}}</td>
                           @else
                            <td>{{trans('system.no')}}</td>
                            @endif

                             @if(!empty($reserve))
                            <td>{{$reserve}}</td>
                           @else
                            <td>{{trans('system.no')}}</td>
                            @endif

                           
                           
                       
                               
 



                        
                              
                        </tr>
                       
                    </tbody>
                  </table>

               

@endsection



