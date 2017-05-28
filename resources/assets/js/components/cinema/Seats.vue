<template>
    <div class="modal" :class="isActive">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete" @click="deactivateSeatsModal"></button>
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
                <a class="button is-success">Save changes</a>
                <a class="button">Cancel</a>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isActive: 'is-active'
            }

        },
        methods: {
            deactivateSeatsModal: function () {
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