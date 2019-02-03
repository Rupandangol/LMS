@extends('backend.master')
@section('title')
   Update Admin
@endsection


@section('content')
    @include('backend.messages.errors')
    @include('backend.messages.message')


    <div class="x_panel">
        <div class="x_title">
            <h2>Form Admin <i class="fa fa-retweet"></i>
                <small>Update Admin</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" action="{{route('update-admin')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Admin Username <span
                                class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="username" placeholder="{{$item->username}}" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="email" placeholder="{{$item->email}}" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Photo <span
                                class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="photo" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span
                                class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="address" placeholder="{{$item->address}}" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <input type="hidden" name="status" value="0" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone NO <span
                                class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="phone" placeholder="{{$item->phone}}" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" required type="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm password" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm
                        Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" required type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



@endsection
