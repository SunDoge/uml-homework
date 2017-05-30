<template>
    <div class="box movie-box" @click="directToMovie">
        <article class="media">
            <div class="media-left">
                <figure class="image is-128x128">
                    <img src="/img/seal.jpg" alt="post">
                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>Name: {{ movie.name }}</p>
                    <p>Director: {{ movie.director }}</p>
                    <p>Stars: {{ movie.stars }}</p>
                    <p>Genres: {{ movie.genres }}</p>
                    <p>Price: {{ movie.price }}元 &nbsp;&nbsp; Runtime: {{ movie.runtime }}分钟</p>
                    <p>Summary: {{ movie.summary }}</p>
                </div>
                <!--<nav class="level is-mobile">-->
                <!--<div class="level-left">-->
                    <!--<a class="level-item" href="/movie">-->
                        <!--<span class="icon is-small"><i class="fa fa-reply"></i></span>-->
                    <!--</a>-->
                    <!--<a class="level-item">-->
                        <!--<span class="icon is-small"><i class="fa fa-retweet"></i></span>-->
                    <!--</a>-->
                    <!--<a class="level-item">-->
                        <!--<span class="icon is-small"><i class="fa fa-heart"></i></span>-->
                    <!--</a>-->
                <!--</div>-->
            <!--</nav>-->
            </div>

        </article>

    </div>
</template>

<script>
    export default {
        props: ['movie'],
        methods: {
            directToMovie: function () {
                window.location.href = '/movie/' + this.movie.id;
            }
        }
    }
</script>

<style type="text/css">
    .movie-box:hover{
        box-shadow: 0 3.5px 6px rgba(0, 0, 0, 0.24), 0 3.5px 8px rgba(0, 0, 0, 0.12);
    }
</style>