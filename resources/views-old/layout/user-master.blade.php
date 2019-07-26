<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>{{ isset($page_title) ? $page_title : __('meta.title.dashboard') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/temp1/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/temp1/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/temp1/page-3.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('header-assets')

</head>
<body class="dashboard{{ isset($body_class) ? " $body_class" : '' }}">

<div class="container-fluid">
    <div class="row justify-content-md-end">
        <div class="col-md-3 leftbar">
            <div class="top-logo navbar-light">
                <h2>CanadaPR</h2>
                <button type="button" class="toggle-nav d-md-none">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="user-sec">
                <img src="{{ asset('/temp1/blank-profile.png') }}">
                <span class="user-name">
                    {{ \Auth::user()->name }}
                </span>
            </div>
            <div class="left-list">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="">Videos</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">Talk to Lawyer</a>
                    </li>
                    @if(Auth::check() && Auth::user()->role == '1')
                    <li class="list-group-item {{ Request::path() == 'immigrant/users' ? 'active' : '' }}">
                        <a href="{{route('immigrant.users')}}">User List</a>
                    </li>
                    <li class="list-group-item {{ Request::path() == 'immigrant/docs' ? 'active' : '' }}">
                        <a href="{{route('immigrant.docs')}}">Upload Documents</a>
                    </li>
                    @endif
                    <li class="list-group-item">
                        <a href="">My Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.leftbar -->
        </div>
        <!-- /.leftbar -->

        <div class="col-12 col-md-9 main-contents">
            <div class="mainbar mt-2 pt-1 pt-md-0 mt-md-0">
                @yield('contents')
            </div>
            <!-- /.mainbar -->
        </div>
        <!-- /.main-contents -->
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{ asset('/temp1/js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.querySelector('.toggle-nav').addEventListener('click', function(){
        var lefbarH = document.querySelector('.leftbar')
        if (lefbarH.classList) {
            lefbarH.classList.toggle("expand-nav");
        } else {
            // For IE9
            var classes = lefbarH.className.split(" ");
            var i = classes.indexOf("expand-nav");

            if (i >= 0)
                classes.splice(i, 1);
            else
                classes.push("expand-nav");
            lefbarH.className = classes.join(" ");
        }
    })
</script>
@yield('footer-assets')
</body>
</html>
