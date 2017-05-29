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
    <div class="container">
        <div class="columns">
            <div class="column">
                <ul>
                    <li>
                        <movie v-for="movie in movies"
                               v-bind:movie="movie"
                               :key="movie.id"
                        ></movie>
                    </li>
                </ul>
            </div>
        </div>
    </div>





@endsection

@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                movies: []
            },
            created() {
                axios.post(
                    '/movie',
                    {
                        query: ''
                    }
                ).then(response => this.movies = response.data)
            }
        });
    </script>
@endsection