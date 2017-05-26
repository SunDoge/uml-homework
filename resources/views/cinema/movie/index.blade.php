@extends('cinema.layouts.app')

@section('content')

    {{--<lu>--}}
    {{--@foreach($movies as $movie)--}}
    {{--<hr>--}}
    {{--<a href="/movie/{{ $movie->id }}">--}}
    {{--<li>--}}
    {{--<p>name: {{ $movie->name }}</p>--}}
    {{--<p>director: {{ $movie->director }}</p>--}}
    {{--<p>price: {{ $movie->price }}元 runtime: {{ $movie->runtime }}分钟</p>--}}
    {{--<p>summary: {{ $movie->summary }}</p>--}}
    {{--</li>--}}
    {{--</a>--}}
    {{--<movie></movie>--}}
    {{--@endforeach--}}
    {{--</lu>--}}

    <ul id="movie-list">
        <li>
            <movie v-for="movie of movies"
                   v-bind:movie="movie"
            ></movie>
        </li>
    </ul>

    <script>
        new Vue ({
            el: '#movie-list',
            data: {
                movies: [
                    {'name': 'test'},
                    {'name': 'test'}
                ]
            },
            created() {
                axios.post(
                    '/movie',
                    {
                        query:''
                    }
                ).then(function (response) {
                    this.data = response.data;
                    console.log(this.data.movies)
//                    for(movie of this.data.movies) {
//                        console.log(movie.name)
//                    }
                })
            }
        });
    </script>

@endsection