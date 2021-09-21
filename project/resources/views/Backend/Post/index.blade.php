
@extends('layouts.backend_master')
@section('title', 'Post')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Posts</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Post</a>
        </div>

    </div>
    <div class="car-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

