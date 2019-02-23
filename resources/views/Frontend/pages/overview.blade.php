@extends('Frontend.layout.frontendMaster')
@section('content')
    {{--Glyicon--}}

    <div class="bs-docs-section">
        <h1 id="glyphicons" class="page-header">Activity</h1>

        <h2 id="glyphicons-glyphs">Available glyphs</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet, beatae dignissimos doloribus eligendi
            iure libero numquam perferendis placeat ratione, repellendus repudiandae sed sint soluta vero vitae voluptas
            voluptate voluptatibus.


        </p>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">

                <li>
                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                    <span class="glyphicon-class">Books:{{count($itemBook)}}</span>
                </li>
                <li>
                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                    <span class="glyphicon-class">Author:{{count($itemAuthor)}}</span>
                </li>

                <li>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="glyphicon-class">Category:{{count($itemCategory)}}</span>
                </li>
                <li>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="glyphicon-class">Returned Books:{{count($history)}}</span>
                </li>
                <li>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="glyphicon-class">Books not returned:{{count($itemIssue)}}</span>
                </li>


            </ul>
        </div>

    </div>
    {{--end of Glyficon--}}


@endsection