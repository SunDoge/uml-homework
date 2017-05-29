<template>
    <div class="box" @click="directToMovie">
        <article class="media">
            <div class="media-left">
                <figure class="image">
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