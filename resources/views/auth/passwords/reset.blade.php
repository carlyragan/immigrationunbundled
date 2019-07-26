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

        <title>{{ __('meta.title.login') }}</title>
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
                        <div class="flash-message">
                            @if(session()->has('message'))
                            <p class="alert alert-success">{{session()->has('message') ? session()->get('message') : ''}}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>

                            @endif

                        </div>
                        <form class="form-horizontal m-auto" method="POST" action="{{ route('password.request') }}" style="max-width: 400px;">
                            {{ csrf_field() }}

                            <div class="cr-heading">
                                <h1 class="position-relative">
                                    Reset Password
                                </h1>
                            </div>
                            <span class="d-block">
                            <input type="hidden" name="token" value="{{ $token }}">
                                <label for="email" class="d-block">email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            <!--<input type="email" id="email" name="email">-->
                            </span>
                            <span class="d-block">
                                <label for="password" class="d-block">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </span>
                            <span class="d-block">
                                <label for="password" class="d-block">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </span>
                            <br>
                            <span class="d-block">
                                <button type="submit" class="go-btn">Reset Password <img src="{{ asset('temp1/arrow-go.jpg') }}" /></button>
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
