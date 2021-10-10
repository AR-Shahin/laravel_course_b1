<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="conatiner">
        <div class="mt">
            <h1>Post Name : {{ $post->title }}</h1>
            <a href="{{ route('single-post',$post->slug) }}">{{ $post->name }}</a>
        </div>
    </div>
</body>
</html>
