@extends('backend.master')
@section('title')
    Manage Issue
@endsection
@section('content')
@include('backend.messages.message')
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Student Name</th>
            <th>Book Title</th>
            <th>Issued Date</th>
            <th>Return Date</th>
            <th>Returned</th>
        </tr>


        @foreach($item as$key=>$value)
            <tr>
                <form method="post" action="{{url('/@admin@/history')}}">
                    {{csrf_field()}}
                    <td>{{++$key}}</td>
                    <td>
                        <input type="hidden" name="id" value="{{$value->id}}">
                        <input type="hidden" name="studentName" value="{{$value->getStudent->username??''}}">
                        {{ucfirst($value->getStudent->username??'')}}
                    </td>
                    <td>
                        <input type="hidden" name="bookTitle" value="{{$value->getBook->title??''}}">
                        {{ucfirst($value->getBook->title??'')}}
                    </td>
                    <td>
                        <input type="hidden" name="createdAt" value="{{$value->created_at}}">
                        <div class="label label-primary">{{$value->created_at}}</div>
                    </td>
                    <td>
                        <input type="hidden" name="date" value="{{$value->date}}">
                        <div class="label label-warning">{{$value->date}}</div>
                    </td>
                    <td>

                        <button class="btn btn-success"><i class="fa fa-retweet"></i> Done</button>

                    </td>
                </form>
            </tr>
        @endforeach

    </table>
@endsection