@extends('backend.master')
@section('title')
    Manage Student
@endsection


@section('content')


    <div class="x_panel">
        <div class="x_title">
            <h2>Student Profile
                <small>Activity report</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="{{URL::to('uploads/StudentImage/'.$item->photo)}}"
                             alt="Avatar"
                             title="Change the avatar">
                    </div>
                </div>
                <h3>{{$item->username}}</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> {{$item->address}}
                    </li>

                    <li>
                        <i class="fa fa-phone user-profile-icon"></i> {{$item->phone}}
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="#" target="_blank">{{$item->email}}</a>
                    </li>
                </ul>

                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                <br>

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                {{--Glyicon--}}

                <div class="bs-docs-section">
                    <h1 id="glyphicons" class="page-header">Activity
                        {{--status--}}

                        <form action="{{url('@admin@/manageStudent/viewStudent/statusStudent    ')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$item->id}}">
                            @if($item->status)
                                <button name="_disable" value="disable" class="btn btn-default"><i class="fa fa-toggle-on"></i></button>
                            @else
                                <button name="_enable" value="enable" class="btn btn-default"><i class="fa fa-toggle-off"></i></button>
                            @endif
                        </form>

                        {{--end of status--}}


                    </h1>

                    <h2 id="glyphicons-glyphs">Available glyphs</h2>
                    <p>Includes 260 glyphs in font format from the Glyphicon Halflings set. <a
                                href="http://glyphicons.com/">Glyphicons</a> Halflings are normally not available
                        for free, but their creator has made them available for Bootstrap free of cost.
                        As a thank you, we only ask that you include a link back to <a
                                href="http://glyphicons.com/">Glyphicons</a> whenever possible.</p>
                    <div class="bs-glyphicons">
                        <ul class="bs-glyphicons-list">

                            <li>
                                <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                <span class="glyphicon-class">Student ID : {{$item->id}}</span>
                            </li>

                            <li>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                <span class="glyphicon-class">Returned Books</span>
                            </li>


                        </ul>
                    </div>


                    {{--end of Glyficon--}}

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
