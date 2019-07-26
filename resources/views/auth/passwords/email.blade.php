<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
            />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('temp1/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('temp1/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('temp1/page-2.css') }}" />

        <title>Reset password</title>
    </head>
    <body class="create h-100">

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


        <div class="cr-main h-100">
            <div class="container">
                <div class="row">
                    <div class="col">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form class="form-horizontal m-auto" method="POST" action="{{ route('password.email') }}" style="max-width: 400px;">
                            {{ csrf_field() }}

                            <div class="cr-heading">
                                <h1 class="position-relative">
                                   {{ __('Reset Password') }}
                                </h1>
                            </div>
                            <span class="d-block">
                                <label for="email" class="d-block">email</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder = "youremail@example.com">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            <!--<input type="email" id="email" name="email">-->
                            </span>
                            <br>
                            <span class="d-block">
                                <button type="submit" class="go-btn">Go <img src="{{ asset('temp1/arrow-go.jpg') }}" /></button>
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
        <script src="{{ asset('temp1/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>