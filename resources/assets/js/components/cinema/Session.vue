<template>
    <article class="message">
        <div class="message-header">
            <p>{{ session.date }}</p>
        </div>
        <div class="message-body">
            <p>{{ session.time }}</p>
            <p>{{ session.room }}</p>

            <a class="button is-success">
                <span class="icon is-small">
                  <i class="fa fa-check"></i>
                </span>
                <span>选择</span>
            </a>
        </div>


    </article>
</template>

<script>
    var current_url = document.URL;
    export default {
        props: ['session'],
    }
</script>