@extends('layouts.frontend_master')


@section('front_title','User Comments')

@section('frontend_master_content')
<div class="card mt-5">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Sl</th>
                <th>Post Tiltle</th>
                <th>Comment</th>
            </tr>

            @foreach ($comments as $comment)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $comment->post->name }}</td>
                <td>{{ $comment->comments }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop
