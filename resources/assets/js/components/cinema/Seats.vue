<template>
    <div class="modal" v-bind:class="[isActive]">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete" @click="closeSeats"></button>
            </header>
            <section class="modal-card-body">
                <div class="content seatContainer" v-if="!success">
                    <ul style="list-style-type: none" v-for="r in 5" class="seatRaw">
                        <li v-for="c in 8" class="seatCol">

                            <div class="button" @click="">
                                <span class="icon">
                                    <i class="fa fa-user-o"></i>
                                </span>
                            </div>

                        </li>
                    </ul>
                </div>

                <div class="content" v-if="success">
                    <h1 class="title has-text-centered">订票成功</h1>
                    <hr>
                    <div class="box">
                        订单信息
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">

                <div class="field" v-if="!success">
                    <a class="button is-success" @click="saveSeats">Save changes</a>
                    <a class="button" @click="closeSeats">Cancel</a>
                </div>

                <div class="field" v-if="success">
                    <a class="button is-success" @click="closeSeats">确定</a>
                </div>

            </footer>
        </div>
    </div>
</template>

<script>
    export default {
//        props: ['seats', 'session'],
        data() {
            var seats = new Array();
            for (let r in 5) {
                var row = new Array();
                for (let c in 8) {
                    row[c] = {member_id: 0};
                }
                seats[r] = row;
            }

            console.log(seats);

            return {
                isActive: '',
                success: false,
                session_id: 0,
                payment: {},
                chosen:[],
                choosing: [],
                seats:seats
            }

        },
        created: function(){
//            console.log(eventHub);



            eventHub.$on('open',this.openSeats);
        },
        destroyed: function(){
            eventHub.$off('open',this.openSeats);
        },
        methods: {
            saveSeats: function () {
                console.log('post the seats to back-end');
                let url = window.location.href;
                axios.post(
                    url + '/session/' + this.session_id + '/ticket',
                    {
                        seats: [

                        ]
                    }
                ).then(response => {
                    this.payment = response.data;
                    console.log(this.payment);
                })
            },
            openSeats: function(session_id){
                this.isActive = 'is-active';
                this.session_id = session_id;
                console.log(this.session_id);
                axios.get(window.location.href + '/session/' + session_id + '/ticket').then(response => {
                    this.chosen = response.data;
                    console.log(this.chosen);
                    console.log(this.seats);
                    this.updateSeats();
                })
            },
            closeSeats: function(){
                eventHub.$emit('close','456');
                this.isActive = '';
            },
            updateSeats: function () {
                for (let seat in this.chosen) {
                    console.log(seat.payment);
                }
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