<template>
    <div>
        <div v-for="doctor in filteredDoctors" :key="doctor.id">
            {{ doctor.name }} {{ doctor.surname }}

            <div v-for="spec in doctor.specializations" :key="spec.id">
                {{ spec.spec_name }}
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            doctors: [],
        };
    },

    computed: {
        specialization() {
            let params = new URL(document.location).searchParams;
            let spec = params.get("specialization");

            return spec;
        },

        filteredDoctors() {
            let filtered = [];
            this.doctors.forEach((doctor) => {
                const specializations = doctor.specializations;
                const filteredSpecs = specializations.map((spec) => {
                    return spec.spec_name === this.specialization;
                });

                if (filteredSpecs.includes(true)) {
                    filtered.push(doctor);
                }
            });
            return filtered;
        },
    },

    methods: {
        fetchDoctors() {
            axios.get("http://localhost:8000/api/doctors", {}).then((res) => {
                this.doctors = res.data.result;
            });
        },
    },

    mounted() {
        this.fetchDoctors();
    },
};
</script>

<style lang="scss" scoped></style>
