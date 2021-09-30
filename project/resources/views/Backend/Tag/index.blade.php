
@extends('layouts.backend_master')
@section('title', 'Tags')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Tags</h4>
        <a href="{{ route('admin.tag.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Tag</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="postTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href="{{ route('admin.tag.edit', $tag->slug) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.tag.destroy', $tag->slug) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

