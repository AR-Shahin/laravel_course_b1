@extends('layout.master')

@section('title') Category @stop

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
@section('master_content')

<div class="card">
    <div class="card-header">
        <h3 class="text-info d-inline">Manage Category</h3>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm" style="float: right">Add New Category</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <img src="{{ $category->image }}" alt="" width="100px">
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            <a href="" class="btn btn-success btn-sm">View</a>
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@stop
