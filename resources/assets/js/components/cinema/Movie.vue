<template>
    <div class="box" @click="directToMovie">
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
                    <p>Price: {{ movie.price }}元 Runtime: {{ movie.runtime }}分钟</p>
                    <p>Summary: {{ movie.summary }}</p>
                </div>
                <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" href="/movie">
                        <span class="icon is-small"><i class="fa fa-reply"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fa fa-heart"></i></span>
                    </a>
                </div>
            </nav>
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