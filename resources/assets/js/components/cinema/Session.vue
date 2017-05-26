<template>
    <article class="message">
        <div class="message-header">
            <p>{{ session.datetime }}</p>
        </div>
        {{ session.datetime }}
        {{ session.room }}
    </article>
</template>

<script>
    export default {
        props: ['session'],
    }
</script>