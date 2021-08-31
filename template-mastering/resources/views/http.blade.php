@extends('layout.master')

@section('master_content')

{{-- @php
    var_dump($data->data)
@endphp --}}

@foreach ($data->data as $row)
    <h1>{{ $row->title }}</h1>
    <hr>
@endforeach
@stop
