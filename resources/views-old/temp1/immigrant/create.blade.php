<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/temp1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/temp1/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/temp1/page-2.css') }}" />

    <title>{{ __('meta.title.login') }}</title>
</head>
<body class="create">

<div class="hm-top bg-theme-primary">
    <div class="">
        <div class="">
            <div class="text-center">
                <h2 class="main-heading">CanadaPR Logo</h2>
            </div>
        </div>
    </div>
</div>
<!-- /.top -->


<div class="cr-main">
    <div class="container">
        <div class="row">
            <div class="col cr-heading">
                <h1 class="position-relative">
                    Immigrate to Canada
                    <img src="{{ asset('/temp1/Aeroplane-1.png') }}" alt="Plane Image" class="plane-img d-none d-md-inline">
                </h1>
                <p>
                    The immigration platform for skilled professional
                </p>
            </div>
        </div>
        <div class="row form">
            <div class="col">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="d-block {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="d-block">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        <!--<input type="text" id="name" name="name">-->
                    </span>
                    <span class="d-block">
                            <label for="email" class="d-block">email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <!--<input type="email" id="email" name="email">-->
                        </span>
                    <span class="d-block">
                            <label for="file" class="d-block">University Degree</label>
                            <input type="file" id="file" name="files">
                        </span>
                    <span class="d-block">
                            <p>
                                <em>Why do you I need this?</em>
                                <br><br>
                                In order to migrate to Canada you'll need minimum of 3 years of
                                university education. For those who have not completed university
                                education, you have other options to migrate to canada however
                                this platform is for those immigrates as a federal skilled worker.
                                <br><br>
                                <em>Adequate Proof of Education:</em>
                                <br><br>
                                - Transcript <br>
                                - Written confirmation
                                - Degree Certificate
                            </p>
                        </span>
                    <span class="d-block">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <!--<input type="password" id="password" name="password">-->
                        </span>
                        <span class="d-block">
                            <label for="password" class="d-block">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </span>
                    <br>
                    <span class="d-block">
                            <button type="submit" class="go-btn">Go <img src="{{ asset('/temp1/arrow-go.jpg') }}" /></button>
                        </span>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /.cr-main -->





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{ asset('/temp1/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
