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



    <movie v-bind:movie="movie"></movie>

    <hr>

    <div class="container">
        <div class="columns">
            <div class="column">
                <ul>
                    <li>
                        <session v-for="session in sessions"
                                 :session="session"
                                 :key="session.id"
                        ></session>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <seats :movie="movie"></seats>


    <a href="/movie" class="button is-primary" id="back">Back</a>


@endsection

@section('js')

    <script>
        {{--var sessions = {!! $sessions->toJson() !!};--}}
        {{--var sessions = sessions.map(function (item) {--}}
            {{--var datetime = item.datetime.split(" ");--}}
            {{--item.date = datetime[0];--}}
            {{--item.time = datetime[1];--}}
            {{--return item--}}
        {{--});--}}

//        console.log(sessions);
        var eventHub = new Vue();
        var member = {!! json_encode(session('user')) !!};
        new Vue({
            el: "#app",
            data: {
                movie: {!! $movie->toJson() !!},
                sessions: {!! $sessions->toJson() !!},
//                showModal: false
            },
            methods: {
                
            }
        })
    </script>

@endsection