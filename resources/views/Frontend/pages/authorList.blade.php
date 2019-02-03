@extends('Frontend.layout.frontendMaster')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Author List
                <small>authors <i class="fa fa-pencil"></i></small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>View Book</th>
                </tr>
                </thead>
                <tbody>
                @foreach($item as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <form action="">
                                <input type="hidden" name="id" value="{{$value->id}}">
                            <button class="btn btn-secondary btn-block"><i class="fa fa-book"> </i> Find Book</button>
                        </td>
                        </form></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection