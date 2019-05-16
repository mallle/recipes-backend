<template>
    <div>
        <h1 v-for="recipe in recipes"> {{ recipe }}</h1>
    </div>
</template>

<script>
export default {
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

<style>

</style>