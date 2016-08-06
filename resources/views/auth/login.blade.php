@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2 text-left">
            <form class="form-horizontal"
                  id="login-front"
                  autocomplete="off"
                  role="form"
                  action="{{ url('/login') }}"
                  method="POST">
                <h2 class="text-primary">Login</h2>
                {{ csrf_field() }}
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class=" control-label">E-Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label">Senha</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group login-footer">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-btn fa-sign-in"></i> Login
                        </button>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
