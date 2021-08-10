<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Many to Many</h1>
        <hr>
{{--
        @foreach ($users as $user)
        <h1>{{ $user->name }}</h1>
            <p>Skills : </p>

            @foreach ($user->skills as $skill)
                {{ $skill->ars->view }}
               <span class="btn btn-sm btn-info">{{ $skill->name }}</span>
            @endforeach
        @endforeach --}}


        @foreach ($users as $user)

        <h3>{{ $user->name }}</h3>
        <p>Skills : </p>

        @foreach ($user->skills as $skill)
        {{ $skill->ars->view }}
                {{ $skill->name }}
        @endforeach
        <hr>
        @endforeach
    </div>



  </body>
</html>
