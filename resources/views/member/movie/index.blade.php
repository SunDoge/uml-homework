<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
</head>
<body>
<lu>
    @foreach($movies as $movie)
        <hr>
        <a href="/movie/{{ $movie->id }}">
            <li>
                <p>name: {{ $movie->name }}</p>
                <p>director: {{ $movie->director }}</p>
                <p>price: {{ $movie->price }}元 runtime: {{ $movie->runtime }}分钟</p>
                <p>summary: {{ $movie->summary }}</p>
            </li>
        </a>
    @endforeach
</lu>
</body>
</html>