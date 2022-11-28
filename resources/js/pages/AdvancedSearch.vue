<template>
    <div class="container mx-auto my-4">

       <h1 class="text-center font-bold text-4xl">advanced search</h1>

     </div>

</template>


<script>


export default {
    name: "AdvancedSearch",
    props: {
        specialization: String
    },
    data() {
        return {
            doctors: '',
            specializations: [],
        }
    },
    created() {
        axios.get('/api/search/specialization')
                .then(res => {
                    if (res.data.success) {
                        this.specializations = res.data.result;
                    }
                });
                console.log(this.specialization)
                
        // this.searchDoctor(1);
    },
}
</script>

<style lang="scss" scoped>

</style>