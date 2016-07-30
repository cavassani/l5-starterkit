<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>

    <!-- Custom CSS -->
    <link href="{{asset('front/css/starterkit.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,900" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-light btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="{{ url('/') }}">{{env('APP_NAME')}}</a>
        </li>
        <li><a href="{{ config('admin.root') }}"><i class="fa fa-btn fa-sign-in"></i> Painel Admin</a></li>
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-user"></i> Login</a></li>
            <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-user"></i> Cadastre-se</a></li>
        @else
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
            </li>

            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>

        @endif

    </ul>
</nav>

<header id="top" class="header">
    <div class="text-vertical-center">
        @yield('content')
    </div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script>
    // Closes the sidebar menu
    $("#menu-close").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });


</script>

</body>

</html>
