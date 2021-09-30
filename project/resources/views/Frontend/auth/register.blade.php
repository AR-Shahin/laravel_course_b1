@extends('layouts.frontend_app')
@section('front_title', 'Auth Register')
@section('frontend_app_content')
<div class="conataier my-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <h3 class="text-center text-info">Register</h3>
            <hr>
            <form action="" class="border p-3">
                <div class="form-group">
                    <label for=""><b>Name : </b></label>
                    <input type="text" class="form-control" name="name" placeholder="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""><b>Email : </b></label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
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
                    <label for=""><b>Confirm Password : </b></label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block rounded">Register</button>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="" class=" btn-link">Login</a>
                    <a href="" class=" btn-link">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
