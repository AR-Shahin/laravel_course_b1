@extends('layouts.backend_master')
@section('title', 'Edit Website Details')
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Update Website Details</h4>
        <a href="{{ route('admin.website.index') }}" class="btn btn-success btn-sm"><i class="fa fa-angle-left"></i> Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.website.update', $website->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-gorup">
                <label for="title">Update Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $website->title }}">
            </div>
            <div class="form-gorup">
                <label for="logo">Update Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>
            <div class="form-gorup">
                <label for="address">Update Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $website->address }}">
            </div>
            <div class="form-gorup">
                <label for="email">Update Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $website->email }}">
            </div>
            <div class="form-gorup">
                <label for="phone">Update Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $website->phone }}">
            </div>
            <div class="form-gorup">
                <label for="facebook">Update Facebook URL</label>
                <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $website->facebook }}">
            </div>
            <div class="form-gorup">
                <label for="twitter">Update Twitter URL</label>
                <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $website->twitter }}">
            </div>
            <div class="form-gorup">
                <label for="instagram">Update Instagram URL</label>
                <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $website->instagram }}">
            </div>
            <div class="form-gorup">
                <label for="behance">Update Behance URL</label>
                <input type="text" name="behance" id="behance" class="form-control" value="{{ $website->behance }}">
            </div>
            <div class="form-gorup">
                <label for="footer_1">Update Footer One</label>
                <input type="text" name="footer_1" id="footer_1" class="form-control" value="{{ $website->footer_1 }}">
            </div>
            <div class="form-gorup">
                <label for="footer_2">Update Footer One</label>
                <input type="text" name="footer_2" id="footer_2" class="form-control" value="{{ $website->footer_2 }}">
            </div>
            <div class="form-gorup">
                <button type="submit" class="form-control btn btn-success btn-block mt-5">Update Website Information</button>
            </div>
        </form>
    </div>
</div>
@endsection

