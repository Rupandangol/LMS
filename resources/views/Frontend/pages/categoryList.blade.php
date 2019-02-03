@extends('Frontend.layout.frontendMaster')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Category List
                <small><i class="fa fa-language"> categories</i></small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>view Book</th>
                </tr>
                </thead>
                <tbody>
                @foreach($item as $key=>$value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->title}}</td>
                        <form method="post" action="{{route('categoryBooks')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$value->id}}">
                            <td>
                                <button class="btn btn-secondary btn-block"><i class="fa fa-book"> </i> Find Book
                                </button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection