<template>
    <div class="field has-addons has-addons-centered">
        <p class="control">
                    <span class="select">
                      <select v-model="query.where">
                        <!--<option>Name</option>-->
                        <!--<option>Director</option>-->
                        <!--<option>Star</option>-->
                        <!--<option>Genre</option>-->
                        <!--<option>Summary</option>-->
                          <option v-for="(o, k) in options" :value="o">{{ k }}</option>
                      </select>
                    </span>
        </p>
        <p class="control">
            <input class="input" type="text" placeholder="Find a movie" v-model="query.value" @keyup="search">
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
                options: {
                    Name: 'name',
                    Director: 'director',
                    Star: 'stars',
                    Genre: 'genres',
                    Summary: 'summary'
                },
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
//                }
                eventHub.$emit('search', this.query);
            },
            selectOption: function(o) {
                console.log(o);
                this.query.where = o;
            }
        }
    }
</script>