@extends('cinema.layouts.app')

@section('content')
    <search></search>
    <hr>
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
        var eventHub = new Vue();
        new Vue({
            el: '#app',
            data: {
                movies: [],
            },
            created() {
                this.search();
                eventHub.$on('search', this.search);
            },
            methods: {
                search(query = null) {
                    console.log(query);
                    axios.post(
                        '/movie',
                        {
                            query: query
                        }
                    ).then(response => this.movies = response.data)
                }
            }
        });
    </script>
@endsection