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
        <h1 class="text-center">Has Many Through</h1>
        <hr>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Shop</th>
                </tr>
                @foreach ($countries as $country)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->cities->count() }}</td>
                    <td>{{ $country->shops->count()}}</td>
                </tr>
                @endforeach

            </table>
    </div>



  </body>
</html>
