@extends('backend.master')
@section('title')
    <h1>Issue Book</h1>
@endsection

@section('content')
    {{--both issue and return--}}
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-pencil-square-o fa-lg"></i>
                <small>Action</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                                              data-toggle="tab" aria-expanded="true">Issue Book</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                        data-toggle="tab" aria-expanded="false">Return Book</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                         aria-labelledby="home-tab">
                        @include('backend.messages.message')
                        <form class="form-horizontal form-label-left input_mask" action="">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Student scanner</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="student_scanner" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Book scanner</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="Book_scanner" class="form-control">
                                </div>
                            </div>

                        </form>
                        <br><br>


                        {{--IssueBook--}}

                        <form class="form-horizontal form-label-left input_mask" method="post"
                              action="{{route('dash-issue')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" name="student_id" id="student_id"
                                           class="form-control"
                                           placeholder="Student ID">
                                </div>
                                @if($errors->has('student_id'))
                                    <div style="left: 327px;" class="text-danger col-md-9 col-sm-9 col-xs-12">
                                        {{$errors->first('student_id')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <span hidden id="student_name"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Book ISBN no</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" class="form-control" id="isbn_id" name="isbn"
                                           placeholder="Book ISBN">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <span hidden id="book_name"></span>
                                </div>
                            </div>
                            @if($errors->has('isbn'))
                                <div style="left: 327px;" class="text-danger col-md-9 col-sm-9 col-xs-12">
                                    {{$errors->first('isbn')}}
                                </div>
                            @endif
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-round btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>


                    {{--Return Book--}}


                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form method="post" id="idForm" class="form-horizontal form-label-left input_mask"
                              action="{{route('dash-return')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Book scanner</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ISBN Code</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="isbn-id" name="isbn" class="form-control">
                                </div>
                            </div>


                            </span>
                            <div class="ln_solid"></div>
                            <div class="form-group">

                                {{--modal--}}


                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" id="fine-cal" class="btn btn-round btn-success"
                                            data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Submit
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Issue Book</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Student
                                                                Name:
                                                            </label>
                                                            <input class="text-danger" name="sName" type="text" id="sName">


                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Book
                                                                Name:</label>
                                                            <input class="text-danger" id="bName" name="bName" type="text">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Fine
                                                                amount:</label>
                                                            <input type="text" name="fine" class="form-control"
                                                                   id="fine_name">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-primary">Return
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                        </form>

                    </div>
                </div>
            </div>

        </div>


    </div>
    {{--end of both issue and return--}}


@endsection

@section('footer-my-script')
    <script src="{{url('js/span-ajax.js')}}"></script>
    <script src="{{url('js/fine-ajax.js')}}"></script>
@endsection