
@extends('layouts.backend_master')
@section('title', 'Post')
@push('css')
<x-utility.data-table-css/>
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Posts</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Post</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="postTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->author->name }}</td>
                        <td><img src="{{ asset($post->image) }}" alt="" width="100px"></td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="" id="status" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                            <a href="" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i></a>
                            <a href="{{ route('admin.post.show',$post->slug) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.post.edit', $post->slug) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.post.destroy', $post->slug) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<x-utility.data-table-js/>
<script>
   $('#postTable').DataTable();

</script>
@endpush
