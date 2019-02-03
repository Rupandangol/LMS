@extends('Frontend.layout.frontendMaster')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Book List
                <small>All Books <i class="fa fa-book"></i></small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Detail</th>
                    <th>Category</th>
                    <th>Author</th>
                </tr>
                </thead>
                <tbody>
                @foreach($item as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->detail}}</td>

                        @foreach($value->categories as $bookKey)
                            <td><div class="label label-primary">{{$bookKey->title}}</div></td>
                        @endforeach
                        @foreach($value->authers as $auther)
                            <td><div class="label label-default">{{$auther->name}}</div></td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection