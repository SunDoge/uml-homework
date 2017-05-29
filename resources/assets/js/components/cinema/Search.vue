<template>
    <div class="field has-addons has-addons-centered">
        <p class="control">
                    <span class="select">
                      <select>
                        <option>Name</option>
                        <option>Director</option>
                        <option>Star</option>
                        <option>Genre</option>
                        <option>Summary</option>
                      </select>
                    </span>
        </p>
        <p class="control">
            <input class="input" type="text" placeholder="Find a movie">
        </p>
        <p class="control">
            <a class="button is-info" @click="search()">
                Search
            </a>
        </p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                query: {
                    where: 'name',
                    value: ''
                }
            }
        },
        methods: {
            search: function () {
//                axios.post(
//                    '/movie',
//                    {
//                        query: {
//                            where: 'name',
//                            value: 'X'
//                        }
//                    }
//                ).then(response => {
//                    console.log(response.data);
//                })
                eventHub.$emit('search', this.query);
            }
        }
    }
</script>