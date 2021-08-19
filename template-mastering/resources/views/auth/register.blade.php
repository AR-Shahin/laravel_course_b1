@extends('layout.app')

@section('title' ,'User Register')


@section('app_content')
<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
          <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">User Register</p>

            <form action="{{ route('store') }}" method="post" autocomplete="off">
                @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="name">

                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
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
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>

                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                     I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">Login</a>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
</div>

@stop
