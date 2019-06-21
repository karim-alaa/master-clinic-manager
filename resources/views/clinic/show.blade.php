
<a href="{{ url('clinic/create') }}">clinic</a>
@extends('home')

@section('content')

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>

             <div class="x_panel">
                <div class="x_title">
                  <h2>Basic Tables <small>basic table subtitle</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Operations</th>
                        <th>Employees</th>
                        <th>Delete</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      </tr>
                            @i = 1
                            @foreach ($clinics as $clinic)
                              <td>{{ $i }}</td>
                              <td>{{ $clinic->name }}</td>
                              <td>
                              <a href="#">Employees</a>
                              </td>
                              <td>
                                <a href="{{ url('clinic/edit/' . $clinic->id) }}">Update</a>
                                </td>
                                <td>
                              <a href="#">Delete</a>
                                </td>
                      </td>
                            @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
  <!-- Table -->
 
</div>

@endsection
