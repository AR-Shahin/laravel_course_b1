<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>

    <div class="container mt-5">
        {{-- <h1 class="text-center">Component</h1>
        <hr>
        @php
            $users = [10,20,30,40];
        @endphp
        <div class="row">
            <div class="col-md-4">
                {{-- @include('components.alert') --}}
                {{-- <x-alert title="Col one" :users="$users"/> --}}
            {{-- </div>
            <div class="col-md-4">Lorem ipsum dolor sit amet.</div>
            <div class="col-md-4">
                <x-alert title="Third Col" :users="$users"/>
            </div>
        </div>

        <hr> --}}

    {{-- <x-admin.test></x-admin.test> --}}
    {{-- <x-abc></x-abc>
    <hr>
{{-- <x-notification type="warning"/> --}}
{{-- <x-notification type="danger"/> --}}

{{-- <hr> --}}
{{--
<x-slot></x-slot> --}}


    </div>

    <hr>
<div class="container">
    <x-abc>
Lorem ipsum dolor sit amet.
<x-slot name="left_col">
    <h3>Left Data</h3>
</x-slot>

<x-slot name="right_col">
    <h3>Right Data</h3>
</x-slot>
    </x-abc>
</div>
<hr>

<x-attribute class="bg-info"  style="color: teal" type="info"></x-attribute>
    </body>
</html>
