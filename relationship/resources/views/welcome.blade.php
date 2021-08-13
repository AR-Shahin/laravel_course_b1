<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Hello, world!</h1>
        <hr>

        @forelse ($users as $user)
            <h5>{{ $user->name }}</h5>
            {{-- <p>Phone : {{ $user->profile->phone ?? 'ddd' }}</p> --}}
             <p>Phone : {{ $user->profile->phone}}</p>
            <p>Post Code : {{ optional($user->profile)->post_code }}</p>
            <hr>
        @empty
        <h4>No Data</h4>
        @endforelse
    </div>

<hr>
{{ $test }} <br>
{{ $key }}

{{ $countries }}
<br>
{{ $globalSkills }}

<br><br>
@customUppercase('shahin')

<br>
<a href="{{ route('2nd') }}">Click Me</a> <!-- Old Way -->

<a href=" @route('2nd')">Another 2nd</a> <br>
<a href="@route('3rd',['id' => 5,'another' => 55])">3rrd</a>
<hr>
<hr>

<x-alert/>

<x-user.user title="This is our title" test="test" :shahin="$var"/>
  </body>
</html>
