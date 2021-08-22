@extends('layout.app')

@section('title' ,'admin Login')


@section('app_content')
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href=""><b>admin </b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.authenticate') }}" method="post">

                @csrf
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="admin@mail.com">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              @error('password')
              <span class="text-danger">{{ $message }}</span>
              @enderror
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
              <a href="{{ route('admin.register') }}" class="text-center">Register</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
</div>

@stop
