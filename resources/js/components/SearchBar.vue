<template>
    <div>
        <input type="text" v-model="query" />
        <input
            type="submit"
            value="Cerca"
            @keyup.enter="fetchDoctor()"
            @click="fetchDoctor()"
        />
    </div>
</template>

<script>
export default {
    methods: {
        fetchDoctor() {
            let params = new URL(document.location).searchParams;
            let name = params.get("specialization");

            console.log(name);
        },
    },

    mounted() {
        this.fetchDoctor();
    },
};
</script>

<style lang="scss" scoped></style>
