@extends('home')

@section('content')
<div class="x_panel">
                <div class="x_title">
                  <h2>{{trans('titles.listOffer')}}</h2>
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
      @if($errors->any())
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('added')}}
  </div>
@endif

                   <center>{!! $offers->links() !!}</center>    
                       <br/>
                       @if(count($offers) != null)
<table class="table table-striped table-bordered table-list" id="myTable">
                    <thead>
                      <tr>
                        <th>{{trans('system.check')}}</th>
                        <th>{{trans('system.name')}}</th>
                        <th>{{trans('system.clinicName')}}</th>
                        <th>{{trans('system.ownerName')}}</th>
                        <th>{{trans('system.ownerMail')}}</th>
                        <th>{{trans('system.clinicPhone')}}</th>
                        <th>{{trans('system.date')}}</th>
                        <th>{{trans('system.offerDescription')}}</th>
                        <th><em class="fa fa-cog"></em></th>
            
                      </tr>
                    </thead>
                    <tbody>
                         <?php $i = 1; ?>
                        @foreach ($offers as $offer)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td>{{ $offer->name }}</td>
                            <td>{{ $offer->clinicName }}</td>
                            <td>{{ $offer->ownerName }}</td>
                            <td>{{ $offer->ownerEmail }}</td>
                            <td>{{ $offer->clinicPhone }}</td>
                            <td>{{ $offer->offer_date }}</td>
                            <td>{{str_limit($offer->description, $limit = 35, $end = '...')}}</td>

                                    <td>
<a href="{{url('doctor/'.$offer->id.'/confirmOffer')}}" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> </a>


 {{ Form::open(['action'=>['OfferController@destroy',$offer->id], 'class'=>'form-horizontal' ,'role'=>'form','method'=>'DELETE']) }}
                                    
                                        {!! csrf_field() !!}


  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span> </button>
  {!! Form::close() !!}
 
                                 </td>


                              
                        
                              
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
<center>{!! $offers->links() !!}</center>

@else
<h2>{{trans('titles.noOffer')}}<h2>
@endif 
                </div>
              </div>

@endsection



