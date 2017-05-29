<template>
    <div class="box" @click="directToMovie">
        <p>Name: {{ movie.name }}</p>
        <p>Director: {{ movie.director }}</p>
        <p>Price: {{ movie.price }}元 Runtime: {{ movie.runtime }}分钟</p>
        <p>Summary: {{ movie.summary }}</p>
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