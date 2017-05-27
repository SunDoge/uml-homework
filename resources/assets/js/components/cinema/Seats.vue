<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Seats</p>
                <button class="delete"></button>
            </header>
            <section class="modal-card-body">
                <div class="container">
                    <ul v-for="r in 5">
                        <li v-for="c in 8">
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
    ul {
        display: flex;
        justify-content: flex-start;
        flex-wrap: nowrap;
        flex-direction: row;
        align-items: center;
    }

    li {
        flex-shrink: 1;
        flex-grow: 1;
    }
</style>