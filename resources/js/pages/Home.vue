<template>
    <div class="container mx-auto my-4">
       <h1 class="text-center font-bold text-4xl">Homepage</h1>

       <search-bar/>
       <Carousel/>
     </div>

</template>


<script>

 import Carousel from '../components/Carousel.vue';
 import SearchBar from '../components/SearchBar.vue';

export default {
    name: "Home",
    components: { Carousel,  SearchBar }
}
</script>

<style lang="scss" scoped>

</style>