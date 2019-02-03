@extends('backend.master')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="container" style="height: 50px ; margin-bottom: 10px">
        @include('backend.messages.errors')

        @include('backend.messages.message')
    </div>


    <form action="{{route('insertCategory')}}" method="post" class="form-horizontal form-label-left">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Name of Category <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="title" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <input name="status" value="0" type="hidden">
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>

    </form>

@endsection