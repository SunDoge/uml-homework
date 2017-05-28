<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete"></button>
            </header>
            <section class="modal-card-body">
                <div class="container seatContainer">
                    <ul v-for="r in 5" class="seatRaw">
                        <li v-for="c in 8" class="seatCol">
                            <span class="icon">
                                <i class="fa fa-home"></i>
                            </span>
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
    export default {}
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
    .seatContainer{
        flex-direction: column;
    }
    .seatCol {
        flex-shrink: 1;
        flex-grow: 1;
        text-align: center;
    }
</style>