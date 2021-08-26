@extends('layout.master')

@section('title') skill @stop

@push('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
@section('master_content')

<div class="card">
    <div class="card-header">
        <h3 class="text-info d-inline">Manage skill</h3>
        <a href="@route('skill.create')" class="btn btn-success btn-sm" style="float: right">Add New skill</a>
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
                <th>User</th>
                <th>Actions</th>
            </tr>
            <tbody>
                @foreach ($skills as $skill)
                    <tr>
                        <td>
                            {{ $skill->id }}
                        </td>

                        <td>
                            {{ $skill->name }}
                        </td>
                        <td>
                            {{ $skill->user->name }}
                        </td>
                        <td>

                            @can('update', $skill)
                            <a href="{{ route('skill.edit',$skill->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endcan

                            <a href="@route('skill.show',$skill->id)" class="btn btn-success btn-sm">View</a>

                            <form  class="d-inline" action="{{ route('skill.destroy',$skill->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $skills->links() }}
    </div>
</div>
@stop
