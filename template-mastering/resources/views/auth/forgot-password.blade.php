@extends('layout.app')

@section('title' ,'User Forgot')


@section('app_content')
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href=""><b>User </b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('password.email') }}" method="post">

                @csrf
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
              <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


            <p class="mb-1">
              <a href="{{ route('login') }}">Login</a>
            </p>
            <p class="mb-0">
              <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
</div>

@stop
