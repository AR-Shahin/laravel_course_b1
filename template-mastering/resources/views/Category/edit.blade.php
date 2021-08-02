@extends('layout.master')

@section('title') Category Create@stop


@section('master_content')

<div class="card">
    <div class="card-header">
        <h3 class="text-info d-inline">Edit Category</h3>
        <a href="{{ route('category.index') }}" class="btn btn-success btn-sm" style="float: right">Back</a>

    </div>
    <div class="card-body">
        <form action="{{ route('category.update',$category->slug) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Name : </label>
                <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{ $category->name }}">
                <span class="text-danger">{{($errors->has('name'))? ($errors->first('name')) : ''}}</span>
            </div>
            <img src="{{ asset($category->image) }}"  width="100px" alt="">
            <div class="form-group">
                <label for="">Image : </label>
                <input type="file" class="form-control" name="image">
                <span class="text-danger">{{($errors->has('image'))? ($errors->first('image')) : ''}}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop
