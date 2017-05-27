<template>
    <article class="message">
        <div class="message-header">
            <p>{{ session.date }}</p>
        </div>
        <div class="message-content">
            <p> {{ session.time }}</p>
            <p>{{ session.room }}</p>
            <!--<button class="btn-primary is-right"></button>-->
        </div>


    </article>
</template>

<script>
    export default {
        props: ['session'],
    }
</script>