<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->

    <title>Document</title>
</head>
<body>
<h1 class="text-center">Hello From Test Mail</h1>
<hr>
<div class="container">
   <img src="{{ asset('img.png') }}" alt="">
    <p>User Name : {{ $user->name }}</p>
    <p>User Email : {{ $user->email }}</p>
    <p>User Created At : {{ $user->created_at->format('Y-m-d h:i:s')}}</p>
    <p>User Created At : {{ $user->created_at->diffForHumans() }}</p>
</div>
</body>
</html>
