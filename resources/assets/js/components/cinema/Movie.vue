<template>
    <div class="card">
        {{ movie.first }}
    </div>
</template>

<script>
    export default {
        props: ['movie']
    }
</script>