@extends('backend.master')
@section('title')
    Manage Category
@endsection
@section('content')

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Category</th>
            <th>status</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($item as$key)
            <tr>
                <td>{{$key->id}}</td>
                <td>{{$key->title}}</td>
                <td>
                    <form action="{{url('/@admin@/manageCategory/status')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$key->id}}">

                    @if($key->status)

                        <button name="_disable" value="disable" class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                    @else
                        <button name="_enable" value="enable" class="btn btn-success" type="submit"><i class="fa fa-check"></i></button>
                    @endif
                    </form>
                </td>
                <td><a href="" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                <td><a href="{{url('/@admin@/manageCategory/cDelete/'.$key->id)}}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a></td>
            </tr>
        @endforeach

    </table>
    {{$item->links()}}


@endsection