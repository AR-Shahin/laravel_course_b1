@extends('layout.master')

@section('title') Category Create@stop


@section('master_content')


<div class="card">
    <div class="card-header">
        <h3 class="text-info d-inline">View Category</h3>
        <a href="{{ route('category.index') }}" class="btn btn-success btn-sm" style="float: right">Back</a>

    </div>
    <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td>{{ $category->name }}</td>
            <td><img src="{{ asset($category->image) }}" alt="" width="100px"></td>
        </tr>
    </table>
    </div>
</div>
@stop
