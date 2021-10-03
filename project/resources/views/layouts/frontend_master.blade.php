@extends('layouts.frontend_app')

@section('frontend_app_content')

<div class="container mt-5">
    <div class="row mt-5 py-4">
        <div class="col-md-4 mt-5">
            <ul class="list-group">
                <li class="list-group-item active"><a href="" class="text-light">Dashboard</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Brookmarks</a></li>
                <li class="list-group-item "><a href="{{ route('user-all-comments') }}" class="text-dark">Coments</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Profile</a></li>
                <li class="list-group-item "><a href="" class="text-dark">Setting</a></li>
              </ul>
        </div>
        <div class="col-md-8">
            @yield('frontend_master_content')
        </div>
    </div>
</div>
@stop
