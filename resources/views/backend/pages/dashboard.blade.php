@extends('backend.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Daily active users
                <small>User</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="bs-example" data-example-id="simple-jumbotron">
                <div class="jumbotron">
                    <h1>Hello, {{strtoupper(Auth::guard('admin')->user()->username)}}</h1>
                    <p>Online Library Management System.</p>
                </div>
            </div>

        </div>
    </div>



    {{--small buttons--}}

    <div class="x_panel">
        <div class="x_title">
            <h2></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>Information Center<code> OVERIEW </code> Elements</p>

            <a class="btn btn-app">
                <span class="badge bg-blue">{{count($AdminItem)}}</span>
                <i class="fa fa-bullhorn"></i> Admins
            </a>
            <a class="btn btn-app">
                <span class="badge bg-green">{{count($StudentItem)}}</span>
                <i class="fa fa-users"></i> Students
            </a>
            <a class="btn btn-app">
                <span class="badge bg-orange">{{count($BookItem)}}</span>
                <i class="fa fa-book"></i>Books
            </a>
            <a class="btn btn-app">
                <span class="badge bg-gray">{{count($AuthorItem)}}</span>
                <i class="fa fa-pencil"></i>Authors
            </a>
            <a class="btn btn-app">
                <span class="badge bg-green">{{count($CategoryItem)}}</span>
                <i class="fa fa-language"></i>Categories
            </a>
            <a class="btn btn-app">
                <span class="badge bg-red">{{count($IssueItem)}}</span>
                <i class="fa fa-exchange"></i>Issued Books
            </a>
            <a class="btn btn-app">
                <span class="badge bg-blue">{{count($history)}}</span>
                <i class="fa fa-history"></i>Returned Books
            </a>
        </div>
    </div>






@endsection
@section('footer-my-script')
    <script>
        {{--// function fineFunction() {--}}
        {{--//--}}
        {{--//     var isbnNo = document.getElementById('isbn_id').value;--}}
        {{--//     debugger;--}}
        {{--//     alert(isbnNo);--}}
        {{--// }--}}

        $("#idForm").submit(function (e) {

            var form = $(this);

            $.ajax({
                type: "POST",
                url: 'onlinelibrarymanagement.com/@admin@/dashReturn',
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    alert(data); // show response from the php script.
                },
                error: function (e) {
                    alert('try again');

                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    </script>
@endsection



