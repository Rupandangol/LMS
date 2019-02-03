@extends('backend.master')
@section('title')
    Manage Student
@endsection


@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Student List
                <small>manage Student</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('backend.messages.message')

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Username</th>
                    <th>View</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($item as$key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->username}}</td>
                        <form method="post" action="{{url('/@admin@/manageStudent/viewStudent')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$value->id}}">
                            <td><button class="btn btn-success" type="submit"><i class="fa fa-sign-in"></i></button></td>
                        </form>
                        <form method="post" action="{{route('delete-student')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$value->id}}">
                            <td><button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button></td>
                        </form>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
