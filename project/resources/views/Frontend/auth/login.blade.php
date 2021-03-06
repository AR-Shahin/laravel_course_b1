@extends('layouts.frontend_app')
@section('front_title', 'Auth Login')
@section('frontend_app_content')
<div class="conataier my-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <h3 class="text-center text-info">Login</h3>
            <hr>
            <form action="{{ route('login') }}" class="border p-3" method="post">
                @csrf
                <div class="form-group">
                    <label for=""><b>Email : </b></label>
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""><b>Password : </b></label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block rounded">Login</button>
                </div>
                <div class="form-group">
                    <a href="{{ route('social.login','google') }}" class="btn btn-info btn-block rounded"> <i class="fa fa-google"></i> Login with Google</a>
                </div>
                <div class="form-group">
                    <a href="{{ route('social.login','github') }}" class="btn btn-primary btn-block rounded"> <i class="fa fa-github"></i> Login with gitHub</a>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('register') }}" class=" btn-link">Register</a>
                    <a href="" class=" btn-link">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
