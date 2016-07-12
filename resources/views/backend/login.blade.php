<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StarterKit</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.css">


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" class="flat-blue login-page">

<div class="container">
    <div class="login-box">
        <div>
            <div class="login-form row">
                <div class="col-sm-12 text-center login-header">
                    <i class="login-logo fa fa-gg fa-5x"></i>
                    <h4 class="login-title">{{env('APP_NAME')}}</h4>
                </div>
                <div class="col-sm-12">
                    <div class="login-body">
                        <form id="admin-login" method="POST" action="{{ url('/login') }}" autocomplete="off">
                            <div class="control">
                                <input id="email" type="email" class="form-control" name="email" autofocus value=" ">
                            </div>
                            <div class="control">
                                <input id="password" type="password" class="form-control" name="password" value=" ">
                            </div>
                            <div class="login-button text-center">
                                <button type="submit" id="login-btn" class="btn btn-primary"><i
                                            class="fa fa-sign-in"></i> Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <p class="text-right"><a href="{{ url('/password/reset') }}" class="">Esqueceu a senha?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.js"></script>

<script type="text/javascript" src="{{asset('admin/app/login.js')}}"></script>

</body>
</html>

