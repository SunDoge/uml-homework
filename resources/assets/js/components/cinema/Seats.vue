<template>
    <div class="modal" :class="[isActive]">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete" @click="closeSeats"></button>
            </header>
            <section class="modal-card-body">
                <div class="content seatContainer" v-if="!success">
                    <ul style="list-style-type: none" v-for="(row, r) in seats" class="seatRaw">
                        <li v-for="(s, c) in row" class="seatCol">

                            <div class="button" :class="[s.class]" v-if="s.disabled" disabled>
                                <span class="icon">
                                    <i class="fa fa-user-o"></i>
                                </span>
                            </div>

                            <div class="button" @click="choose(r, c)" :class="[s.class]"  v-else>
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
                        <p>用户名：{{ member.nickname }}</p>
                        <p>电影名：{{ movie.name }}</p>
                        <p>场次信息：No.{{ session.id }} {{ session.datetime }}</p>
                        <p>座位信息：</p>
                        <ul>
                            <li v-for="s in choosing">
                                {{ s.r + 1 }}排{{ s.c + 1 }}座
                            </li>
                        </ul>
                        <p>总价：{{ payment.amount }}</p>
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
        props: ['movie'],
        data() {
            let seats = new Array();
            for (let r=0; r<5; r++) {
                var row = new Array();
                for (let c=0; c<8; c++) {
                    row[c] = {
//                        member_id: 0,
                        class: '',
//                        status: 0, // 0: selectable | 1: you select it | -1: others select it
                        disabled: false,
                    };
                }
                seats[r] = row;
            }
//
//            console.log(seats);

            return {
                isActive: '',
                success: false,
                session: {},
                payment: {},
                chosen:[],
                choosing: [],
                seats:seats,
                member: member
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
                let seats = [];
                this.seats.forEach((row, r) => {
                    row.forEach((i, c) => {
                        if(i.class === 'is-success' && !i.disabled) {
                            seats.push({
                                r: r,
                                c: c,
                            })
                        }
                    })
                });
                console.log(seats);

                axios.post(
                    url + '/session/' + this.session.id + '/ticket',
                    {
                        seats: seats
                    }
                ).then(response => {
                    this.payment = response.data;
                    this.success = true;
                    this.choosing = seats;
                    console.log(this.payment);
                })
            },
            openSeats: function(session){
                this.isActive = 'is-active';
//                this.session_id = session_id;
                this.session = session;
                console.log(this.session.id);

                for (let r=0; r<5; r++) {
                    for (let c=0; c<8; c++) {
                        this.seats[r][c].class = '';
                        this.seats[r][c].disabled = false;
                    }
                }

                axios.get(window.location.href + '/session/' + session.id + '/ticket').then(response => {
                    this.chosen = response.data;
                    console.log(this.chosen);
                    console.log(this.seats);
                    this.updateSeats();
                })
            },
            closeSeats: function(){
                eventHub.$emit('close','456');
                this.isActive = '';
                this.success = false;
            },
            updateSeats: function () {

                console.log(this.chosen);
                console.log(this.seats);
                for (let seat of this.chosen) {
//                    console.log(seat);
//                    let status = seat.payment.member_id == member.id ? 1: -1;
//                    this.seats[seat.seat.r -1][seat.seat.c -1].status = seat.payment.member_id == member.id ? 1: -1;
                    this.seats[seat.seat.r][seat.seat.c].class = seat.payment.member_id == member.id ? 'is-success': 'is-danger';
                    this.seats[seat.seat.r][seat.seat.c].disabled = true;
                }
            },
            choose: function (r, c) {
                this.seats[r][c].class = this.seats[r][c].class === 'is-success' ? '' : 'is-success';
                console.log('choose' + r + ',' + c);
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