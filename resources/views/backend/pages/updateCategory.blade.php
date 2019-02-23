@extends('backend.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container" style="height: 50px ; margin-bottom: 10px">
        @include('backend.messages.errors')

        @include('backend.messages.message')
    </div>


    <form action="{{route('edit-action')}}" method="post" class="form-horizontal form-label-left">
        {{csrf_field()}}
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Name of Category <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{$item->title}}" name="title" class="form-control col-md-7 col-xs-12">
            </div>
        </div>
        <input type="hidden" name="id" value="{{$item->id}}">
        <input name="status" value="0" type="hidden">
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success btn-block">Edit</button>
            </div>
        </div>

    </form>
@endsection

