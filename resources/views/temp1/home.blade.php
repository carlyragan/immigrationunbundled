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
    <link rel="stylesheet" href="{{ asset('temp1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('temp1/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>{{ __('meta.title.home')  }}</title>
</head>
<style>
        .sticky-menu {
            position: fixed;
            top: -100px;
            left: 0;
            width: 100%;
            background: #300e0d;
            z-index: 1;
            margin-top: 0px;
            margin-left: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
            transition-duration: .2s;
        }

        .sticky-menu.active {
            top: 0;
        }

        .sticky-menu a.top-link {
            display: inline-block;
        }
    </style>
<body class="home">

<div class="hm-top bg-theme-primary">
    <div class="container">
        <div class="row brand-area">
            <div class="col text-left">
                <h2 class="main-heading">Immigration Unbundled</h2>
            </div>
            <div class="col text-right">
                <a href="{{ route('login') }}" class="top-link">Login</a>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <p class="header-text">
                    We guarantee, you can manage the immigration process yourself. <br>
                    With a little help along the way!
                </p>
                <div class="start-proc-urls">
                    <a href="{{ route('immigrant.calendy') }}" class="top-hm-btns mr-2">Talk to Lawyer</a>
                    <a href="{{ route('immigrant.create') }}" class="top-hm-btns">Begin Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.top -->

<div class="hm-main hm-steps" style="background-image: url('{{ asset('/temp1/canadian-flag-b&w.jpg') }}')">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h3>Step 1:  <br>
                    Create Account</h3>
                <span>
                <a href="{{ route('immigrant.create') }}"><img src="{{ asset('temp1/createaccount1.svg') }}" class="img-index">
                </a>
                </span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree.
                </p>
            </div>
            <div class="col">
                <h3>Step 2:  <br>
                    Calculate Score</h3>
                <span><img src="{{ asset('temp1/calculate-score.svg') }}" class="img-index"></span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree.
                </p>
            </div>
            <div class="col">
                <h3>Step 3:  <br>
                    Increase Score</h3>
                <span><img src="{{ asset('temp1/increase-score.svg') }}" class="img-index"></span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree.
                </p>
            </div>
            <div class="col">
                <h3>Step 4:  <br>
                    Talk to Lawyer</h3>
                <span><img src="{{ asset('temp1/talk-to-lawyer.svg') }}" class="img-index"></span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree.
                </p>
            </div>
            <div class="col">
                <h3>Step 5:  <br>
                    Upload Document</h3>
                <span><img src="{{ asset('temp1/upload-documents.svg') }}" class="img-index"></span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree or other proof
                </p>
            </div>
            <div class="col">
                <h3>Step 6:  <br>
                    Submit Application</h3>
                <span><img src="{{ asset('temp1/submit-application.svg') }}" class="img-index"></span>
                <p class="d-none hms-text-hover">
                    Create an account by uploading proof that
                    you have a university degree. Simply upload a
                    a picture of your degree.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- /.hm-main -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{ asset('temp1/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
<script>
    $(document).ready(function () {
        var navClone = $(".brand-area").clone();
        navClone.addClass('sticky-menu');
        $("body").append(navClone);

        $(window).scroll(function () {

            if ($(window).scrollTop() > 100) {
                $(".sticky-menu").addClass('active');
            } else {
                $(".sticky-menu").removeClass('active');
            }

        })
    });
</script>
