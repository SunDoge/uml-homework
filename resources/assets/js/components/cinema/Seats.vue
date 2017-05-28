<template>
    <div class="modal" v-bind:class="[isActive]">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete" @click="closeSeat"></button>
            </header>
            <section class="modal-card-body">
                <div class="container seatContainer">
                    <ul v-for="r in 5" class="seatRaw">
                        <li v-for="c in 8" class="seatCol">

                            <div class="button">
                                <span class="icon">
                                    <i class="fa fa-user-o"></i>
                                </span>
                            </div>

                        </li>
                    </ul>
                </div>
            </section>
            <footer class="modal-card-foot">
                <a class="button is-success" @click="saveSeats">Save changes</a>
                <a class="button" @click="closeSeat">Cancel</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['seats', 'session'],
        data() {
            return {
                isActive: 'is-active'
            }

        },
        created: function(){
            console.log(eventHub);
            eventHub.$on('open',this.openSeat);
        },
        destroyed: function(){
            eventHub.$off('open',this.openSeat);
        },
        methods: {
            saveSeats: function () {
                console.log('post the seats to back-end')
                axios.post(
                    '/movie/'
                )
            },
            openSeat: function(text){
                this.isActive = 'is-active';
                console.log(text);
            },
            closeSeat: function(){
                eventHub.$emit('close','456');
                this.isActive = '';
            }
        }
    }
</script>

<style type="text/css">
    .seatContainer, .seatRaw {
        display: flex;
        justify-content: flex-start;
        flex-wrap: nowrap;
        flex-direction: row;
        align-items: center;
        width: 100%;
    }

    .seatContainer {
        flex-direction: column;
    }

    .seatCol {
        flex-shrink: 1;
        flex-grow: 1;
        text-align: center;
    }
</style>