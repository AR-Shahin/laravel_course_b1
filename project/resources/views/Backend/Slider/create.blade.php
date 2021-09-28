@extends('layouts.backend_master')
@section('title', 'Add Sliders')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Add Slider</h4>
        <a href="{{ route('admin.slider.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-gorup">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter a Slider Title">
            </div>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-gorup">
                <label for="image">Title</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Add Slider</button>
            </div>
        </form>
    </div>
</div>
@endsection

