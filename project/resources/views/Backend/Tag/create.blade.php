@extends('layouts.backend_master')
@section('title', 'Tag Create')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Add New Tag</h4>
        <a href="{{ route('admin.tag.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tag.store') }}" method="POST">
            @csrf
            <div class="form-gorup">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter a New Tag Name">
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Create Tag</button>
            </div>
        </form>
    </div>
</div>
@endsection

