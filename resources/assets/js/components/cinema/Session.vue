<template>
    <article class="message">
        <div class="message-header">
            <p>{{ session.date }}</p>
        </div>
        <div class="message-body">
            <p>{{ session.time }}</p>
            <p>{{ session.room }}</p>

            <button class="button is-success" @click="showSeats">

                <span class="icon is-small">
                  <i class="fa fa-check"></i>
                </span>
                <span>选择</span>
            </button>
        </div>


    </article>
</template>

<script>
    var session_url;
    export default {
        props: ['session'],
        methods: {
            showSeats : function () {
                eventHub.$emit('open', this.session);
                session_url = document.URL + '/session/'
            }
        }
    }
</script>