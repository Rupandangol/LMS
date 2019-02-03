@extends('backend.layouts.header')
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                @include('backend.messages.errors')
                @include('backend.messages.message')
                <form method="post" action="{{route('login-student')}}">
                    {{csrf_field()}}
                    <h1>Student Login</h1>
                    <div>
                        <input required type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    <div>
                        <input required type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-round btn-default">Log in</button>
                        <input name="remember_me" type="checkbox">Remember me
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-book"></i> Online library Management System</h1>
                            <p>©2019 All Rights Reserved. Online LMS! Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
