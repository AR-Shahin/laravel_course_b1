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
        <h1 class="text-center">Has One Through</h1>
        <hr>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Machanic</th>
                    <th>Car</th>
                    <th>Owner</th>
                </tr>
                @foreach ($machanics as $machanic)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $machanic->name }}</td>
                    <td>{{ $machanic->car->name }}</td>
                    <td>{{ $machanic->owner->name }}</td>
                </tr>
                @endforeach

            </table>
    </div>



  </body>
</html>
