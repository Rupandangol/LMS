@extends('backend.master')
@section('title')
    ISBN List
@endsection
@section('content')
    @include('backend.messages.message')

    <div class="x_panel">
        <div class="x_title">
            <h2>Stripped table
                <small>Stripped table subtitle</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ISBN no</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Data as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->isbn}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection