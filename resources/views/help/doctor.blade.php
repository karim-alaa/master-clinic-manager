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
                  <h2>Offers</h2>
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
                <strong>1- click on services </strong><br/>
                <strong>2- click on Show My Offer </strong><br/>
                <strong>3- click on Accept to accept offer {{ Html::image('help_pic\Acept.PNG','Accept_offer',array('class'=>'img-thumbnail')) }}</strong><br/>
               
                <strong>4- click on Reject to reject offer {{ Html::image('help_pic\Reject.PNG','Reject_offer',array('class'=>'img-thumbnail')) }} </strong>
                <br/>
               </div>
            </div>

                                <div class="x_panel">
                <div class="x_title">
                  <h2>Display Appointment</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on services </strong><br/>
                <strong>2- click on List My Appointment </strong><br/>

                  

               </div>
            </div>


                                <div class="x_panel">
                <div class="x_title">
                  <h2>Custom PDMA</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <strong>1- click on services </strong><br/>
                <strong>2- click on custom Your Own PDMA </strong><br/>

               </div>
            </div>
                  
@endSection