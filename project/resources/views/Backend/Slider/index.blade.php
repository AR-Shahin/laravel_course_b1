
@extends('layouts.backend_master')
@section('title', 'Slider')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Sliders</h4>
        <a href="{{ route('admin.slider.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Slider</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="postTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $slider->title }}</td>
                        <td><img src="{{ asset($slider->image) }}" alt="" width="150px"></td>
                        <td>{{ $slider->status == 1 ? 'Active': 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.slider.destroy', $slider->id) }}" class="d-inline" method="POST" enctype="multipart/form-data">
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

