@extends('backend.master')
@section('title')
    HISTORY
@endsection
@section('content')
    @include('backend.messages.message')

    <div class="pull-right">
        <form method="post" action="{{url('/@admin@/historyList/search')}}">
            {{csrf_field()}}
            <label class="label label-default" for="find">Student ID</label>
              <input type="text" required name="finder">
            <button type="submit" class="btn btn-round"><i class="fa fa-search-plus"></i></button>
        </form>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Student Name</th>
            <th>Book Title</th>
            <th>Issued Date</th>
            <th>Return Date</th>
            <th>Returned Date</th>
            <th>Fine Amount</th>
        </tr>


        @foreach($item as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->studentName}}</td>
                <td>{{$value->bookTitle}}</td>
                <td>{{$value->createdAt}}</td>
                <td>{{$value->date}}</td>
                <td>{{$value->created_at}}</td>
                <td>Rs. 20</td>
            </tr>
        @endforeach


    </table>
@endsection