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
import axios from "axios";
import state from "../store.js";

export default {
    methods: {
        fetchDoctor() {
            const anchor = document.location.href;
            const queryString = anchor.search("=");
            const ciccio = anchor.substring(queryString + 1);

            const ciccio2 = ciccio.replace("+", " ");

            console.log(ciccio2);
        },
    },

    mounted() {
        this.fetchDoctor();
    },
};
</script>

<style lang="scss" scoped></style>
