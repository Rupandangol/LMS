@extends('backend.master')
@section('title')
    <h1>Issue Book</h1>
@endsection

@section('content')
    <div class="x_panel">
        <div class="x_content">
            <br>
            @include('backend.messages.message')
            <form class="form-horizontal form-label-left input_mask" method="post" action="{{url('@admin@/issueBook/check')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" name="student_id" id="student_id" required="required" class="form-control" placeholder="Student ID">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Book ID</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" class="form-control" required="required" name="book_id" placeholder="Book ID">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Return Date<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input class="date-picker form-control col-md-7 col-xs-12" name="date" required="required" type="date">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-round btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection