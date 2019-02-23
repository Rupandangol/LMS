@extends('backend.master')
@section('title')
    HISTORY Search
@endsection
@section('content')

    @include('backend.messages.message')

    <div class="pull-right">
        <a class="btn btn-round" href="{{url('/@admin@/historyList')}}"><i class="fa fa-search-plus"> List</i></a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Student Name</th>
            <th>Book Title</th>
            <th>Issued Date</th>
            <th>Return Date</th>
            <th>Returned Date</th>
        </tr>


        @foreach($item as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->studentName}}</td>
                <td>{{$value->bookTitle}}</td>
                <td>{{$value->createdAt}}</td>
                <td>{{$value->date}}</td>
                <td>{{$value->created_at}}</td>
            </tr>
        @endforeach


    </table>
@endsection