
@extends('layouts.backend_master')
@section('title', 'Post')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Posts</h4>
        <a href="{{ route('admin.post.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

    </div>
    <div class="card-body">
        <table class=" table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $post->name }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $post->category->name }}</td>
            </tr>
            <tr>
                <th>Sub Category</th>
                <td>{{ $post->sub_category->name }}</td>
            </tr>
             <tr>
                <th>Tags</th>
                <td>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection

