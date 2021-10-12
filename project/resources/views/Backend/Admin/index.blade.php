
@extends('layouts.backend_master')
@section('title', 'Admin')
@push('css')
<x-utility.data-table-css/>
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Admins</h4>
        <a href="{{ route('admin.admin.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Admin</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="AdminTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as  $admin)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>Image</td>
                    <td>{{ $admin->role }}</td>
                    <td>Status</td>
                    <td>Actions</td>
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
   $('#AdminTable').DataTable();

</script>
@endpush
