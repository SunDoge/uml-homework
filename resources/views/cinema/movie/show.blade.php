{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<movie-info>--}}
    {{--<p align="center">Movie Info</p>--}}
    {{--<p>name: {{ $movie->name }}</p>--}}
    {{--<p>director: {{ $movie->director }}</p>--}}
    {{--<p>price: {{ $movie->price }}元 runtime: {{ $movie->runtime }}分钟</p>--}}
    {{--<p>summary: {{ $movie->summary }}</p>--}}

    {{--<hr>--}}

    {{--<lu>--}}
        {{--@foreach($sessions as $session)--}}
            {{--<a href="#">--}}
                {{--<li>--}}
                    {{--<p>ID: {{ $session->id }}</p>--}}
                    {{--<p>Time: {{ $session->datetime }}</p>--}}
                    {{--<p>Room: {{ $session->room }}</p>--}}
                    {{--<button>Select</button>--}}
                {{--</li>--}}
            {{--</a>--}}
        {{--@endforeach--}}
    {{--</lu>--}}
{{--</movie-info>--}}
{{--</body>--}}
{{--</html>--}}

@extends('cinema.layouts.app')

@section('content')
<movie></movie>



@endsection