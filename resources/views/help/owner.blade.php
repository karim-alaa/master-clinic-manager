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
                  <h2> Add New clinic</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click on Add New Clinic</strong><br/>


              </div>
            </div>


                        <div class="x_panel">
                <div class="x_title">
                  <h2>Add Nurse for Clinic</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click My Clinics </strong><br/>
                <strong>3- click on the Add New {{ Html::image('help_pic\Add_Employe.PNG','Add_Employe',array('class'=>'img-thumbnail')) }}</strong><br/>
                <strong>4- click Add New Nurse </strong><br/>

              </div>
            </div>


                                    <div class="x_panel">
                <div class="x_title">
                  <h2>Sack Employee</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click My Clinics </strong><br/>
                <strong>3- click on the Add New {{ Html::image('help_pic\Add_Employe.PNG','Add_Employe',array('class'=>'img-thumbnail')) }}</strong><br/>
                <strong>4- click on sack </strong><br/>

              </div>
            </div>

                                    <div class="x_panel">
                <div class="x_title">
                  <h2>Delete Clinic</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click My Clinics </strong><br/>
                <strong>3- click on the Delete {{ Html::image('help_pic\delete.PNG','delete',array('class'=>'img-thumbnail')) }}</strong><br/>
              

              </div>
            </div>


                                    <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Clinic Information</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click My Clinics </strong><br/>
                <strong>3- click on the Edit {{ Html::image('help_pic\edit.PNG','edit',array('class'=>'img-thumbnail')) }}</strong><br/>
                

              </div>
            </div>

                                                    


                        <div class="x_panel">
                <div class="x_title">
                  <h2>Display Your Clinics And Report</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click My Clinics </strong><br/>
                <strong>3- click on Report to display a Report {{ Html::image('help_pic\report.PNG','report',array('class'=>'img-thumbnail')) }}</strong><br/>

              </div>
            </div>


                        <div class="x_panel">
                <div class="x_title">
                  <h2>Display Doctors On The System And Send Offer</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click on Show All Doctors </strong><br/>
                <strong>3- click on Send Offer to send offer to Doctors {{ Html::image('help_pic\send_offer.PNG','send_offer',array('class'=>'img-thumbnail')) }}</strong><br/>

              </div>
            </div>


                        <div class="x_panel">
                <div class="x_title">
                  <h2>Display List Reservation History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click on List Reservation History </strong><br/>

              </div>
            </div>
                  

                                          <div class="x_panel">
                <div class="x_title">
                  <h2>Download Patient File</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <strong>1- click on Services </strong><br/>
                <strong>2- click on List Reservation History </strong><br/>
                <strong>3- click on Download Patient File {{ Html::image('help_pic\down_file.PNG','down_file',array('class'=>'img-thumbnail')) }}</strong><br/>

              </div>
            </div>


@endSection

