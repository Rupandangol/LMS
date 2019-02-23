@extends('backend.master')
@section('title')
    Manage Author
@endsection
@section('content')
@include('backend.messages.message')
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Author</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($item as$key)
            <tr>
                <td>{{$key->id}}</td>
                <td>{{$key->name}}</td>

                <td>
                    <form action="{{url('/@admin@/manageCategory/statusAuther')}}" method="post">
                        {{csrf_field()}}
                        <input name="id" value="{{$key->id}}" type="hidden">

                        @if($key->status)
                            <button type="submit" name="_disable" value="disable" class="btn btn-danger"><i
                                        class="fa fa-times"></i></button>
                        @else
                            <button type="submit" name="_enable" value="enable" class="btn btn-success"><i
                                        class="fa fa-check"></i></button>
                        @endif
                    </form>

                </td>

                <td><a href="{{url('/@admin@/manageAuther/aEdit/'.$key->id)}}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{url('/@admin@/manageAuther/aDelete/'.$key->id)}}" class="btn btn-danger">delete</a></td>
            </tr>
        @endforeach

    </table>

@endsection