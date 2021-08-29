@extends('layout.master')

@section('title') Category @stop

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
@section('master_content')

<div class="card">
    <div class="card-header">
        <h3 class="text-info d-inline">Manage Category</h3>
        <a href="@route('category.create')" class="btn btn-success btn-sm" style="float: right">Add New Category</a>
    </div>

    {{-- @cannot('isAdmin')
        hshs
    @endcannot --}}
    @can('isAdmin')
    <h1>Admin Can get access</h1>
    @endcan

    @can('isEditor')
    <h1>Editor Can get access</h1>
    @endcan
    @can('isModerator')
    <h1>Moderator Can get access</h1>
    @endcan
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

                            {{-- @can('update-post',$category)
                            <a href="@route('category.edit',$category->slug)" class="btn btn-primary btn-sm">Edit</a>
                            @endcan --}}

                            {{-- <a href="{{ route('category.edit',$category->slug) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                            <a href="@route('category.show',$category->slug)" class="btn btn-success btn-sm">View</a>

                            <form  class="d-inline" action="{{ route('category.destroy',$category->slug) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
