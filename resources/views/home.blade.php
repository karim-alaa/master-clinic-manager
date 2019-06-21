<!DOCTYPE html>
<html  >
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>My Clinic</title>

  <!-- Bootstrap core CSS -->
  {{Html::style('css/bootstrap.min.css')}}
  {{Html::style('css/font-awesome.min.css')}}
  {{Html::style('css/animate.min.css')}}
  {{Html::style('css/tour/bootstrap-tour.min.css')}}

  <!-- Custom styling plus plugins -->
  {{Html::style('css/custom.css')}}
  {{Html::style('css/maps/jquery-jvectormap-2.0.3.css')}}
  {{Html::style('css/icheck/flat/green.css')}}
  {{Html::style('css/floatexamples.css')}}


   <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  {{Html::script('js/flot/jquery.flot.js')}}    
  {{Html::script('js/flot/jquery.flot.pie.js')}}    
  {{Html::script('js/flot/jquery.flot.orderBars.js')}}    
  {{Html::script('js/flot/jquery.flot.time.min.js')}}    
  {{Html::script('js/flot/date.js')}}    
  {{Html::script('js/flot/jquery.flot.spline.js')}}    
  {{Html::script('js/flot/jquery.flot.stack.js')}}    
  {{Html::script('js/flot/curvedLines.js')}}    
  {{Html::script('js/flot/jquery.flot.resize.js')}}   

   <!-- Bootstrap core general CSS for font-awesome -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">



{{Html::script('js/bootstrap-confirmation.js')}}
  {{Html::script('js/jquery.min.js')}}
  {{Html::script('js/nprogress.js')}}
    {{Html::script('js/tour/bootstrap-tour.min.js')}}
  <!--[if lt IE 9]-->
    {{Html::script('assets/js/ie8-responsive-file-warning.js')}}
        <!--[endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]-->
      {{Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}
      {{Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}
        <!--[endif]-->
<style>
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #1B2A3A;
    border-color: #337ab7;
}
</style>


  <script> 
    $(function()
    {
      $('[type="date"].min-date').prop('min',function()
        {
return new Date().toJSON().split('T')[0];
        });});
    function getreservations(date,doctor){
    //  alert(date + doctor);
        var d = (new Date(date).getDay()+1)%7+1;
        $.ajax({
          url: '/reservation/'+date+'/'+doctor,
          dataType: 'JSON',
          type: 'get',
          success: function(data)
            {
              document.getElementById("tb").innerHTML = "";
               // console.log(data);
            
                
              if(data.reservations.length >0){
                var text = "";
                for (i = 0; i < data.reservations.length; i++) { 
                 text += '<tr><td>'+ i +'</td><td>'+ data.reservations[i].name +'</td><td>'+ data.reservations[i].nationality_id +'</td><td>'+ data.reservations[i].tecket_num +'</td><td>'+ data.reservations[i].is_examination +'</td><td>'+ data.reservations[i].date +'</td><td><a href="http://localhost:8000/reservation/'+data.reservations[i].id+'/edit" ><button class="btn btn-default"><em class="glyphicon glyphicon-pencil"></em></button></td><td></a>'
                 +'<a href="http://localhost:8000/reservation/cansel/'+data.reservations[i].id+'" ><button class="btn btn-danger"><em class="glyphicon glyphicon-trash"></em></button></a>'
                 +'</td>'
                 +'</tr>';
                           // alert(data.reservations[i].id);
                }
                document.getElementById("tb").innerHTML = text;
              //  console.log(data);
            
              }
              else{
                
              document.getElementById("tb").innerHTML = "<tr><td colspan = '7'>there no</td></tr>";
                
              }
              //console.log(data);
             },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
        });
        return false;
      
    }

    function getDoctors(id,date)
      {
        var d = (new Date(date).getDay()+1)%7+1;
        
        
        $.ajax({
          url: '/doctor/d/'+id+'/'+d,
          dataType: 'JSON',
          type: 'get',
          success: function(data)
            {
              document.getElementById("selectDoc").innerHTML = "";
                
              if(data.doctors != "error"){
                var text = "";
                for (i = 0; i < data.doctors.length; i++) { 
                 text += '<option value="'+ data.doctors[i].employee_id +'">'+ data.doctors[i].name +'</option>';
                }
                document.getElementById("selectDoc").innerHTML = text;
                console.log(data);
            
              }
              else{
                alert("there in no doctor");
              }
             }
        });
        return false;
      }
  </script>






</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-heartbeat"></i> <span>{{trans('system.clinicSystem')}}</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
            {{ Html::image(Auth::user()->avatar,Auth::user()->name,array('class'=>'img-circle profile_img')) }}
            </div>
            <div class="profile_info">
              <span>{{trans('message.welcome')}}</span>
              <h2>{{ Auth::user()->name }} </h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br/>
    
          <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="clearfix"></div>
            <div class="menu_section">
              <ul class="nav side-menu">
                <li id="tour_step_1"><a><i class="fa fa-home"></i> {{trans('system.profile')}} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">

                      @if (Auth::user()->role_id == 1)
                    <li><a href="{{ url('/nurse/'.Auth::id().'/edit')  }}">{{trans('system.editProfile')}}</a>
                        @endif
                        
                        @if (Auth::user()->role_id == 2)
                    <li><a href="{{ url('/doctor/'.Auth::id().'/edit')  }}">{{trans('system.editProfile')}}</a>
                        @endif
                        
                        @if (Auth::user()->role_id == 3)
                      <li><a href="{{ url('/ClinicOwner/'.Auth::id().'/edit')  }}">{{trans('system.editProfile')}}</a>
                        @endif
                    </li>
                  </ul>
                </li>
                <li id="tour_step_3"><a><i class="fa fa-edit"></i>{{trans('system.services')}} <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                   @if (Auth::user()->role_id == 1)
                    <li><a href="{{ url('/nurse/'.Auth::id().'/reserve/patient/new')  }}">{{trans('system.addPatient')}}</a>
                    <li><a href="{{ url('/nurse/'.Auth::id().'/reserve/patient/exist')  }}">{{trans('system.reserve')}}</a>
                    <li><a href="{{ url('/nurse/timetable')  }}">{{trans('system.timeTable')}}</a>
                    <li><a href="{{ url('/nurse/reservations')  }}">{{trans('system.listReservation')}}</a>
                    @endif
                     @if (Auth::user()->role_id == 2)
                    <li><a href="{{ url('offer/'.Auth::id().'/listOffers') }}" class="">{{trans('system.listMyOffer')}}</a>
                  <li><a href="{{ url('doctor/myAppintment') }}" class="">{{trans('system.listMyAppointment')}}</a>
                  
                  <li><a href="{{ url('doctor/edit/PDMA') }}" class="">{{trans('system.customPDMA')}}</a>
                    @endif
                     @if (Auth::user()->role_id == 3)
                      <li><a href="{{ url('clinic') }}">{{trans('system.myClinic')}}</a></li>
                    <li><a href="{{ url('doctor/listDoctors') }}"   class="">{{trans('system.listDoctor')}}</a>
                    <li><a href="{{ url('owner/reservation/history') }}" class="">{{trans('system.reservationHistory')}}</a>
                    <li><a href="{{ url('clinic/create') }}"   class="">{{trans('system.addClinic')}}</a></li>
                    @endif


                    
                  
                  </ul>
                </li>


                 <li id="tour_step_5"><a><i class="fa fa-font"></i> {{trans('system.lang')}} (  {{ Config::get('languages')[App::getLocale()] }} ) <span class="fa fa-chevron-down"></span> </a>
                  <ul class="nav child_menu" style="display: none">
                        @foreach (Config::get('languages') as $lang => $language)
                           <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                        @endforeach
                     
                  </ul>
                </li>
                
                
 
       
    

             
               


                
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons 
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>-->
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li  id="tour_step_2" class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              {{ Html::image(Auth::user()->avatar,Auth::user()->name) }}
{{ Auth::user()->name }} 
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                         
                  <li>
                      @if (Auth::user()->role_id == 1)
                       <a href="{{ url('/nurse/'.Auth::id().'/edit')  }}"> 
                      <span class="pull-right"><span class="glyphicon glyphicon-user"></span> </span>
                      {{trans('system.profile')}}</a>
                      @endif
                      
                      @if (Auth::user()->role_id == 2)
                      <a href="{{ url('/doctor/'.Auth::id().'/edit')  }}"> 
                      <span class="pull-right"><span class="glyphicon glyphicon-user"></span> </span>
                        {{trans('system.profile')}}</a>
                      @endif
                      
                      @if (Auth::user()->role_id == 3)
                      <a href="{{ url('/ClinicOwner/'.Auth::id().'/edit')  }}">
                      <span class="pull-right"><span class="glyphicon glyphicon-user"></span> </span>
                         {{trans('system.profile')}}</a>
                      @endif
                  </li>
                    
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>{{trans('system.setting')}}</span>
                    </a>
                  </li>
                                <li>
<a href="{{url('/user/help')}}"   >
 <span class="   pull-right"><span class="glyphicon glyphicon-question-sign"></span> </span>
{{trans('system.help')}}</a>
</li>

 
 

                  <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> {{trans('system.logout')}}</a>
                  </li>
                </ul>
              </li>









              

              <li id="tour_step_4" role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                   @if(null !==(Session::get('not')))
                     <?php  $i = 0 ; ?>
                    @foreach(Session::get('not') as $noty )
                       <?php  $i++; ?>  
                     @endforeach
                      <?php  if($i != 0) 
          echo  '<span class="badge bg-green">'. $i .'</span>';
 
                      ?> 
                
                  @endif
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                @if(null !==(Session::get('not')))
                  @foreach(Session::get('not') as $noty )
                  <li>
                    <a href="{{$noty->link}}">
                      <span class="image">
                      {{ Html::image($noty->avatar,$noty->name,array('class'=>'img-circle profile_img')) }}                                    </span>
                      <span>
                                        <span>{{$noty->name}}</span>
                      </span>
                      <span class="message">
                        {{$noty->note}}
                      </span>
                    </a>
                  </li>
                  @endforeach
                  @endif
                <!--  <li>
                    <div class="text-center">
                      <a href="inbox.html">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li> -->
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
    @yield('content')

        <!-- /footer content -->
        </div>

      </div>
      <!-- /page content -->

    </div>

  </div>


    
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  {{Html::script('js/bootstrap.min.js')}}  
  <!-- gauge js -->
  {{Html::script('js/gauge/gauge.min.js')}}  
  {{Html::script('js/gauge/gauge_demo.js')}}  
  <!-- bootstrap progress js -->
  {{Html::script('js/progressbar/bootstrap-progressbar.min.js')}}  
  {{Html::script('js/nicescroll/jquery.nicescroll.min.js')}}  
  <!-- icheck -->
  {{Html::script('js/icheck/icheck.min.js')}}  
  <!-- daterangepicker -->
  {{Html::script('js/moment/moment.min.js')}}  
  {{Html::script('js/datepicker/daterangepicker.js')}}  
  <!-- chart js -->
  {{Html::script('js/chartjs/chart.min.js')}}  
  {{Html::script('js/custom.js')}}  


  
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  {{Html::script('js/maps/jquery-jvectormap-2.0.3.min.js')}}
  {{Html::script('js/maps/gdp-data.js')}}  
  {{Html::script('js/maps/jquery-jvectormap-world-mill-en.js')}}
  {{Html::script('js/maps/jquery-jvectormap-us-aea-en.js')}}    
  {{Html::script('js/pace/pace.min.js')}}    
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
   {{Html::script('js/skycons/skycons.min.js')}}    
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
    NProgress.done();
  </script>




 
 

  <!-- /datepicker -->
  <!-- /footer content -->
</body>
      
</html>
