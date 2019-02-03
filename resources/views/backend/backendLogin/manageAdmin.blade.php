@extends('backend.master')
@section('title')
    Manage Admin
@endsection


@section('content')
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <ul class="pagination pagination-split">
                        <li><a href="#">A</a></li>
                        <li><a href="#">B</a></li>
                        <li><a href="#">C</a></li>
                        <li><a href="#">D</a></li>
                        <li><a href="#">E</a></li>
                        <li>...</li>
                        <li><a href="#">W</a></li>
                        <li><a href="#">X</a></li>
                        <li><a href="#">Y</a></li>
                        <li><a href="#">Z</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>

                @include('backend.messages.message')

                @foreach($item as $key=>$value)

                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h4 class="brief"><i>Admin {{++$key}}</i></h4>
                                <div class="left col-xs-7">
                                    <h2>{{ucfirst($value->username)}}</h2>
                                    <p><strong>Email: </strong>{{$value->email}}</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: {{$value->address}}</li>
                                        <li><i class="fa fa-phone"></i> Phone #: {{$value->phone}}</li>
                                    </ul>
                                </div>
                                <div class="right col-xs-5 text-center">
                                    <img src="{{URL::to('uploads/AdminImage/'.$value->photo)}}" alt=""
                                         class="img-circle img-responsive">
                                </div>
                            </div>
                            <div class="col-xs-12 bottom text-center">
                                <div class="col-xs-12 col-sm-6 emphasis">
                                    <form method="post" action="{{url('/@admin@/statusAdmin')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @if($value->status)
                                            <button name="_disable" type="submit" value="disable"
                                                    class="btn btn-success btn-xs">
                                                <i class="fa fa-circle-o-notch"> </i>
                                            </button>
                                        @else
                                            <button type="submit" name="_enable" value="enable"
                                                    class="btn btn-default btn-xs">
                                                <i class="fa fa-circle-o-notch"> </i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-6 emphasis">
                                    <form action="{{route('delete-admin')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        <button name="_delete" value="delete" type="submit" class="btn btn-success btn-xs"><i class="fa fa-trash">
                                            </i> Delete
                                        </button>

                                        <button name="_update" value="update" type="submit" class="btn btn-primary btn-xs">
                                            <i class="fa fa-retweet"> </i> UPDATE
                                        </button>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach


            </div>
        </div>
    </div>

@endsection
