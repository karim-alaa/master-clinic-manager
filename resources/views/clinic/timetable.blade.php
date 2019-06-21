@extends('home')

@section('content')

 
             <div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.timeTable')}}</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                @if(!empty($doctorInDays))
                  <!-- Table -->
                     <table class="table">
                        <thead>
                          <tr>
                            <th>{{trans('system.doctorName')}}</th>
                            <th>{{trans('system.day')}}</th>
                            <th>{{trans('system.from')}}</th>
                            <th>{{trans('system.to')}}</th>
                          </tr>
                          @foreach ($doctorInDays as $key => $value)
                            <tr>
                              <td rowspan="{{$value}}">{{$key}}</td>
                              <?php
                                if($value){
                                  $count = 0;
                                  $current = $timetable[0]->name;
                                  foreach ( $timetable as $element ) {
                                    if($current != $element->name )
                                      $count = 0;
                                    if ( $key == $element->name ) {
                                      if($count != 0)
                                        echo "<tr>";
                                        echo                 
                                              "<td>".$element->day."</td>                
                                              <td>".$element->from."</td>                
                                              <td>".$element->to."</td>                
                                            </tr>";
                                      
                                    }
                                    $current = $element->name;
                                    $count++;
                                  }
                                }
                              ?>
                          @endforeach
                        </thead>
                         
                     </table>
                     @else
                     <h2>No Doctor In Clinic To Show In Time Table</h2>
                     @endif
                    </div>

              
@endsection