@extends('backend.master')
@section('title')
    HISTORY
@endsection
@section('content')

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