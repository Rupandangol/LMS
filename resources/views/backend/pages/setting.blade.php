@extends('backend.master')
@section('title')
    Settings
@endsection

@section('content')
    @include('backend.messages.message  ')

    <div class="x_panel">
        <div class="x_title">
            <h2>Advance <small>Fine Management</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-horizontal form-label-left" method="post" action="{{url('/@admin@/setting/settingAction')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">No of books that can be issued<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="noOfIssue" value="{{$item->noOfIssue}}" required="required" type="text" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Fine Amount in Rs<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="fineAmount" value="{{$item->fineAmount}}" type="text" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Return time</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="returnTime" class="form-control">
                            <option value="15days">15 days</option>
                            <option value="1month">1 month</option>
                            <option value="3months">3 months</option>
                            <option value="6months">6 months</option>
                            <option value="1year">1 year</option>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{route('admin-dashboard')}}">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
