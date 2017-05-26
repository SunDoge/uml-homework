<template>
    <div class="card">
        <p>name: {{ movie.name }}</p>
        <p>director: {{ movie.director }}</p>
        <p>price: {{ movie.price }}元 runtime: {{ $movie->runtime }}分钟</p>
        <p>summary: {{ movie.summary }}</p>
    </div>
</template>

<script>
    export default {
        props: ['movie']
    }
</script>