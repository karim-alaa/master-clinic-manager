@extends('home')            

@section('content')

                          <div class="x_panel">
                <div class="x_title">
                  <h2>Update Profile</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <strong>1- click on your Name</strong><br/>
                    <strong>2- choose profile</strong><br/>
                    <strong>* click on Basic to update email-address ,username and nationality ID</strong><br/>
                    <strong>* click on Lovely to update your image</strong><br/>
                    <strong>* click on Advanced to update your password</strong>
                  {{ Html::image('help_pic\profile_bar.jpg','update_profile',array('class'=>'img-thumbnail')) }}
               </div>
            </div>


            <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Patient</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services</strong><br/>
                <strong>2- click on Add New Patient</strong><br/>

              </div>
            </div>
                  

                              <div class="x_panel">
                <div class="x_title">
                  <h2>Reserve Appointment</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services</strong><br/>
                <strong>2- click on Reserve Appointment</strong><br/>

              </div>
            </div>


                        <div class="x_panel">
                <div class="x_title">
                  <h2>Display Time Table</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services</strong><br/>
                <strong>2- click on Time Table</strong><br/>

              </div>
            </div>


                        <div class="x_panel">
                <div class="x_title">
                  <h2>List All Reservation</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services</strong><br/>
                <strong>2- click on List All Reservation</strong><br/>

              </div>
            </div>


@endSection

