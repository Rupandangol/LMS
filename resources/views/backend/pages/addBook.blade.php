@extends('backend.master')
@section('title')
    Add Book
@endsection


@section('content')
    @include('backend.messages.errors')
    @include('backend.messages.message')
    <div class="container">
        <form action="{{route('insertBook')}}" method="post">
            {{csrf_field()}}
            <label for="title">Title
                <input class="form-control" style="width: 660px;" name="title" type="text">
            </label><br>
            <label for="detail">Detail
                <input class="form-control" style="width: 660px;" name="detail" type="text">
            </label><br>
            <label for="no_of_books">No of Books
                <input class="form-control" style="width: 660px;" name="no_of_books" type="text">
            </label><br>
            <label>Category
                <br><select multiple class="form-control" id="categories" name="categories[]">
                @foreach($item as $key)
                    <option style="width: 623px" value="{{$key->id}}">{{$key->title}}</option>
                @endforeach
            </select></label> <br>


            <label>Auther
            <select class="form-control" name="authers">
                @foreach($data as $key)
                    <option value="{{$key->id}}">{{$key->name}}</option>
                @endforeach
            </select>
            </label> <br>
            <button class="btn btn-success" type="submit">Insert</button>
        </form>
    </div>
@endsection

@section('footer-my-script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {
            $('#categories').select2();
        })

    </script>
@endsection