@extends('layouts.backend_master')
@section('title', 'Edit Tag')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Update Tag</h4>
        <a href="{{ route('admin.tag.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-gorup">
                <label for="name">Update Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}">
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Update Tag</button>
            </div>
        </form>
    </div>
</div>
@endsection

