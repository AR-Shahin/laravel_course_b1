<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Has Many</title>
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Has Many</h1>
        <hr>

        {{-- <code>
            {{ $users }}
        </code> --}}

         @forelse ($users as $user)
            <h5>{{ $user->name }}</h5>

            <p>User Post</p>
                @foreach ($user->posts as  $post)
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->view }}</p>
                @endforeach
            <hr>
        @empty
        <h4>No Data</h4>
        @endforelse
    </div>



  </body>
</html>
