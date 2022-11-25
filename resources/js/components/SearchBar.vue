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
            axios.get("http://localhost:8000/api/doctors", {}).then((res) => {
                state.originals_doctors = res.data.result;

                console.log(state.originals_doctors);
            });
        },
    },
};
</script>

<style lang="scss" scoped></style>
