@extends('Frontend.layout.frontendMaster')

@section('title')
    category

@endsection

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ucfirst($categoryOnly->title)}}
                <small>List</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td></td>
                    <td></td>
                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection