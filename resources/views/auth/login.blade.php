@extends('layouts.app')

@section('content')


    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>BRIT Medicare</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/fontawesome-free/css/all.min.css">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('dashboard_assets') }}/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
      <div class="row justify-content-center"> 
        <img class="img-fluid" src="{{ asset('dashboard_assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 100px">
      </div>
      <div class="login-logo">
        <a style="font-size: 4vw" href="{{ url('login') }}"><b>BRIT</b> Medicare</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>


          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
              <input placeholder="E-mail" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="input-group mt-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="col-12 mt-3">
                <div class="row">
                  <div class="col-7">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="rememberme">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-5">
                    <button type="submit" class="btn btn-primary float-right">
                        {{ __('Login') }}
                    </button>

                    
                  </div>
                  <!-- /.col -->
                </div>
            </div>
          </form>

          <p class="mb-2">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('dashboard_assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashboard_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard_assets') }}/dist/js/adminlte.min.js"></script>
    </body>
    </html>

@endsection
