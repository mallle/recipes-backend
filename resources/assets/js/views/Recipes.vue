<template>

    <section class="section" id="app">
        <div class="container">
            <div class="columns notification is-light is-variable is-multiline">
                <div class="column is-4" v-for="recipe in recipes">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img :src="recipe.image" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{ recipe.name }}</p>
                                    <div class="columns">
                                        <div class="column">
                                            <i class="fas fa-users"></i> {{ recipe.persons }}
                                        </div>
                                        <div class="column">
                                            <i class="fas fa-stopwatch"></i> {{ recipe.preparationtime }} Minuten
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Recipes",

        data() {
            return {
                recipes: ''
            }
        },
        created() {
            axios.get('/api/recipes').then(response => this.recipes = response.data);
        }
    }
</script>