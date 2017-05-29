<template>
    <div class="box">
        <p>Name: {{ movie.name }}</p>
        <p>Director: {{ movie.director }}</p>
        <p>Price: {{ movie.price }}元 Runtime: {{ movie.runtime }}分钟</p>
        <p>Summary: {{ movie.summary }}</p>
    </div>
</template>

<script>
    export default {
        props: ['movie']
    }
</script>