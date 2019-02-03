@extends('backend.master')

@section('content')

    <table class="table table-bordered">

        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Detail</th>
            <th>No of Books</th>
            <th colspan="2">Action</th>
        </tr>


        @foreach($item as $key)
            <tr>
                <td>{{$key->id}}</td>
                <td>{{$key->title}}</td>
                <td>

                    @foreach($key->categories as $bookKey)
                        <span class="label label-default">{{$bookKey->title}}</span>
                    @endforeach

                </td>
                <td>
                    @foreach($key->authers as $autherKey)
                        <span class="label label-primary">{{$autherKey->name}}</span>
                    @endforeach
                </td>
                <td>
                    <p title="{{$key->detail}}">{{str_limit($key->detail,5)}}</p>
                </td>
                <td><code>{{$key->no_of_books}}</code></td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                </td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach

    </table>

@endsection

@section('footer-my-script')
    <!-- bootstrap-progressbar -->
    <script src="{{URL::to('lib/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
@endsection

@section('my-header')
    <!-- iCheck -->
    <link href="{{URL::to('lib/iCheck/skins/flat/green.css')}}" rel="stylesheet">
@endsection